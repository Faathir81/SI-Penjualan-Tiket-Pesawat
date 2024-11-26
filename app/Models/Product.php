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

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // app/Models/Product.php
    public static function getFilteredProducts($departureLocation = null, $arrivalLocation = null)
    {
        return self::query()
            ->when($departureLocation, function ($query, $departureLocation) {
                $query->where('departure_location', 'like', '%' . $departureLocation . '%');
            })
            ->when($arrivalLocation, function ($query, $arrivalLocation) {
                $query->where('arrival_location', 'like', '%' . $arrivalLocation . '%');
            })
            ->orderBy('id', 'desc')
            ->get();
    }
}
