<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    protected $filliable = [
        'order_id',
        'product_id',
        'sale_price',
    ];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
