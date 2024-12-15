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
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    /**
     * Relasi ke pengguna (User)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Filter produk berdasarkan lokasi keberangkatan dan tujuan
     *
     * @param string|null $departureLocation
     * @param string|null $arrivalLocation
     * @return \Illuminate\Database\Eloquent\Collection
     */
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
