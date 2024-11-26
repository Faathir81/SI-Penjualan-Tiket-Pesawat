<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);

        // Ambil daftar kursi yang sudah dipesan untuk produk ini
        $occupiedSeats = Order::where('product_id', $productId)->pluck('seat')->toArray();

        return view('orders.create', [
            'product' => $product,
            'ticketQuantity' => 1,
            'occupiedSeats' => $occupiedSeats, // Kirim data kursi yang sudah dipesan ke view
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'quantity' => 'required|integer|min:1',
            'seat' => 'required|integer|min:1|max:25',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->quota_tiket) {
            return back()->withErrors(['quantity' => 'Jumlah tiket melebihi kuota yang tersedia.']);
        }

        // Periksa apakah kursi sudah dipesan
        $seatTaken = Order::where('product_id', $product->id)
            ->where('seat', $request->seat)
            ->exists();

        if ($seatTaken) {
            return back()->withErrors(['seat' => 'Nomor kursi sudah dipesan. Silakan pilih kursi lain.']);
        }

        // Buat pesanan baru
        $order = Order::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(), // Pastikan user_id disimpan
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'seat' => $request->seat,
            'total_price' => $product->price * $request->quantity,
        ]);

        // Kurangi kuota tiket
        $product->decrement('quota_tiket', $request->quantity);

        return redirect()->route('dashboard')->with('success', 'Pemesanan berhasil!');
    }

    public function showTransactionForm()
    {
        return view('orders.formtransaksi');
    }

    public function processTransaction(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1', // Validasi input uang
        ]);

        $amount = $request->input('amount');

        // Anda dapat menambahkan logika tambahan seperti mencatat transaksi di database
        // atau menghitung sisa uang setelah pembelian tiket, jika relevan.

        return redirect()->route('dashboard')->with('success', "Transaksi berhasil! Anda telah memasukkan uang sebesar Rp{$amount}.");
    }
}
