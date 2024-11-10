<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda
    protected $table = 'checkins';

    // Tentukan relasi dengan tabel Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    // Tentukan atribut yang bisa diisi
    protected $fillable = [
        'transaksi_id',
        'checkin_status',
        'checkin_time',
    ];
}
