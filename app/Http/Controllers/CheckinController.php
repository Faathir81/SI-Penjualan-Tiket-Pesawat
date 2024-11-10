<?php

// app/Http/Controllers/CheckinController.php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    // Menampilkan dashboard check-in
    public function index()
    {
        return view('checkin.index');
    }

    // Detail atau form untuk check-in
    public function create($transaksi_id)
    {
        $transaksi = Transaksi::findOrFail($transaksi_id);

        // Menampilkan form check-in jika transaksi sudah lunas
        if ($transaksi->status !== 'paid') {
            return redirect()->route('checkins.index')->with('error', 'Transaksi belum lunas.');
        }

        return view('checkins.create', compact('transaksi'));
    }
}
