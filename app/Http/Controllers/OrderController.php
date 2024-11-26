<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman pemesanan tiket
    public function create($productId)
    {
        // Mendapatkan detail produk berdasarkan ID
        $product = Product::findOrFail($productId);

        // Mendapatkan daftar kursi yang sudah dipesan
        $occupiedSeats = Order::where('product_id', $productId)->pluck('seat')->toArray();

        return view('orders.create', [
            'product' => $product,
            'occupiedSeats' => $occupiedSeats,
        ]);
    }

    // Menyimpan data pemesanan tiket
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'quantity' => 'required|integer|min:1',
            'seat' => 'required|integer|min:1|max:25',
        ]);

        // Mendapatkan produk berdasarkan ID
        $product = Product::findOrFail($request->product_id);

        // Validasi kuota tiket
        if ($request->quantity > $product->quota_tiket) {
            return back()->withErrors(['quantity' => 'Jumlah tiket melebihi kuota yang tersedia.']);
        }

        // Validasi apakah kursi sudah dipesan
        $seatTaken = Order::where('product_id', $product->id)
            ->where('seat', $request->seat)
            ->exists();

        if ($seatTaken) {
            return back()->withErrors(['seat' => 'Nomor kursi sudah dipesan. Silakan pilih kursi lain.']);
        }

        // Menyimpan pesanan ke database
        $order = Order::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'seat' => $request->seat,
            'total_price' => $product->price * $request->quantity,
        ]);

        // Mengurangi kuota tiket
        $product->decrement('quota_tiket', $request->quantity);

        // Redirect ke halaman transaksi
        return redirect()->route('transaction.show', $order->id)
            ->with('success', 'Pemesanan berhasil! Lihat detail transaksi Anda.');
    }

    // Menampilkan detail transaksi berdasarkan pesanan
    public function showtransaksiForm(Order $order)
    {
        // Memastikan user hanya bisa melihat transaksinya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('orders.transaksi', [
            'order' => $order,
        ]);
    }

    public function processtransaksi(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($request->order_id);
        $totalPrice = $order->total_price;

        if ($request->amount < $totalPrice) {
            return back()->withErrors(['amount' => 'Jumlah uang kurang dari total harga.']);
        } elseif ($request->amount > $totalPrice) {
            return back()->withErrors(['amount' => 'Jumlah uang melebihi total harga.']);
        }

        // Simpan status pembayaran lunas
        $order->update(['status' => 'paid']);

        // Redirect ke halaman detail tiket
        return redirect()->route('ticket.detail', $order->id)
            ->with('success', 'Pembayaran berhasil! Berikut detail tiket Anda.');
    }

    // Menampilkan detail tiket setelah pembayaran
    public function showTicketDetail(Order $order)
    {
        // Pastikan user hanya bisa melihat tiketnya sendiri
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('orders.ticket-detail', [
            'order' => $order,
        ]);
    }

    public function viewTicket(Order $order)
    {
        // Pastikan user hanya bisa melihat tiket miliknya
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('orders.ticket', ['order' => $order]);
    }

    public function myTicket()
    {
        $currentTime = now();

        $tickets = Order::where('user_id', Auth::id())
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.departure_time', '>=', $currentTime)
            ->orderBy('products.departure_time', 'asc')
            ->select('orders.*')
            ->with('product')
            ->get();

        return view('orders.my-ticket', ['tickets' => $tickets]);
    }

    public function userHistory()
    {
        $orders = Order::where('user_id', Auth::id())->with('product')->orderBy('created_at', 'desc')->get();

        return view('orders.history', ['orders' => $orders]);
    }
}
