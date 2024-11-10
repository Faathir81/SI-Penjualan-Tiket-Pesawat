<?php

// app/Models/Pesanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Relasi ke User (pembeli)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // id_user adalah kolom foreign key di tabel pesanan
    }

    // Relasi ke Product (tiket)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
