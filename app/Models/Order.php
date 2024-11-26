<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'name',
        'email',
        'phone',
        'quantity',
        'total_price',
        'seat'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
