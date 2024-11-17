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
        $userId = Auth::id();

        // Cek apakah pengguna sudah memesan tiket untuk produk ini
        $existingOrder = Order::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($existingOrder) {
            return redirect()->back()->with('error', 'Anda sudah memesan tiket untuk produk ini.');
        }

        return view('orders.create', [
            'product' => Product::findOrFail($productId), // Sesuaikan dengan model produk Anda
            'ticketQuantity' => 1 // Hanya 1 tiket
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->quota_tiket) {
            return back()->withErrors(['quantity' => 'Jumlah tiket melebihi kuota yang tersedia.']);
        }

        $order = Order::create([
            'product_id' => $product->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        // Update product quota
        $product->decrement('quota_tiket', $request->quantity);

        return redirect()->route('dashboard')->with('success', 'Pemesanan berhasil!');
    }
}
