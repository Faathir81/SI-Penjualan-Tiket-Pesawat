<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    /**
     * Memulai transaksi dengan Midtrans.
     */
    public function initiate(Order $order, Product $product)
    {
        try {
            // Persiapkan detail transaksi
            $transactionDetails = [
                'order_id' => 'TRX-' . strtoupper(Str::random(5)) . '-' . $order->id,
                'gross_amount' => $order->total_price,
            ];

            $itemDetails = [
                [
                    'id' => $order->id,
                    'price' => $order->product->price,
                    'quantity' => $order->quantity,
                    'name' => 'Tiket ' . $order->product->airline,
                ],
            ];

            $customerDetails = [
                'first_name' => $order->name,
                'email' => $order->email,
                'phone' => $order->phone,
            ];

            $transactionData = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
                'callbacks' => [
                    'finish' => route('payment.redirect'),
                ],
            ];

            // Generate Snap Token
            $snapToken = Snap::getSnapToken($transactionData);

            // Simpan Snap Token ke order
            $order->update(['snap_token' => $snapToken]);

            return view('payments.initiate', compact('order', 'snapToken', 'transactionDetails', 'itemDetails', 'customerDetails'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal memulai pembayaran: ' . $e->getMessage()]);
        }
    }

    /**
     * Menangani callback dari Midtrans.
     */
    public function handleCallback(Request $request)
    {
        try {
            // Validasi signature key
            $serverKey = config('services.midtrans.serverKey');
            $signatureKey = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

            if ($signatureKey !== $request->signature_key) {
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            // Perbarui status pesanan berdasarkan callback
            $order = Order::where('id', $request->order_id)->first();

            if ($order) {
                $order->update(['status' => $request->transaction_status]);

                return response()->json(['message' => 'Payment status updated']);
            }

            return response()->json(['message' => 'Order not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Callback processing failed: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Menangani redirect setelah pembayaran.
     */
    public function handleRedirect(Request $request)
    {
        $orderId = $request->query('order_id');
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        if ($transactionStatus === 'settlement' && $statusCode == '200') {
            return redirect()->route('payment.success', ['orderId' => $orderId]);
        } elseif ($transactionStatus === 'pending') {
            return redirect()->route('payment.pending', ['orderId' => $orderId]);
        } else {
            return redirect()->route('payment.failed', ['orderId' => $orderId]);
        }
    }

    public function successPage(Request $request)
    {
        $orderId = $request->query('orderId');

        preg_match('/\d+$/', $orderId, $matches);
        $orderNumber = $matches[0] ?? null;

        return view('payments.success', ['orderNumber' => $orderNumber]);
    }
}
