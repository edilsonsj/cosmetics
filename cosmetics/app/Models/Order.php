<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->select('products.*', 'order_products.sale_price')
            ->withTimestamps();
    }

    public function orderItems()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->withPivot('sale_price')
            ->withTimestamps();
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
