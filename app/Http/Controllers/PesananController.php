<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id); // Mendapatkan data produk berdasarkan ID
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login

        // Menampilkan halaman dengan data yang diperlukan
        return view('pesanan.dashboard', [
            'product' => $product,
            'user' => $user,
        ]);
    }

    public function create(Request $request, $product_id)
    {
        // Validasi data form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
            'price' => 'required|numeric',
        ]);

        // Menyimpan data pesanan
        $pesanan = new Pesanan();
        $pesanan->id_user = Auth::id(); // Menggunakan ID pengguna yang login
        $pesanan->product_id = $validated['product_id'];
        $pesanan->quantity = $validated['quantity'];
        $pesanan->total_price = $validated['price'] * $validated['quantity'];
        $pesanan->status = 'pending';
        $pesanan->save();

        // Redirect ke dashboard transaksi
        return redirect()->route('transaksi.dashboard', ['transaksi_id' => $pesanan->id]);
    }
}
