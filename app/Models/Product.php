<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'airline',
        'category',
        'departure_location',
        'arrival_location',
        'departure_time',
        'arrival_time',
        'price',
        'quota_tiket',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // app/Models/Product.php
    public static function getFilteredProducts($departureLocation = null)
    {
        return self::when($departureLocation, function ($query, $departureLocation) {
            $query->where('departure_location', 'like', '%' . $departureLocation . '%');
        })->orderBy('id', 'desc')->get();
    }
}
