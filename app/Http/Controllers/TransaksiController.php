<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menyimpan transaksi
    public function store(Request $request)
    {
        $request->validate([
            'payment_amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'pesanan_id' => 'required|exists:pesanans,id',
        ]);

        $pesanan = Pesanan::findOrFail($request->pesanan_id);

        $transaksi = new Transaksi();
        $transaksi->pesanan_id = $pesanan->id;
        $transaksi->payment_amount = $request->payment_amount;
        $transaksi->payment_method = $request->payment_method;
        $transaksi->status = $request->payment_amount >= $pesanan->total_price ? 'paid' : 'pending';
        $transaksi->id_user = $pesanan->id_user; // Menggunakan id_user dari pesanan
        $transaksi->save();

        return redirect()->route('transaksi.dashboard', ['transaksi_id' => $transaksi->id])->with('success', 'Pembayaran berhasil!');
    }

    // Menampilkan dashboard transaksi
    public function dashboard($transaksi_id)
    {
        $transaksi = Transaksi::findOrFail($transaksi_id);

        return view('transaksi.dashboard', [
            'transaksi' => $transaksi,
        ]);
    }
}
