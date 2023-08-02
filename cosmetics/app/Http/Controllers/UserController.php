<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Order;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function orders()
    {
        $user_id = auth()->user()->id;

        $orders = Order::where('user_id', $user_id)
            ->with(['products' => function ($query) {
                $query->join('products as product_details', 'product_details.id', '=', 'order_products.product_id')
                    ->select('product_details.*', 'order_products.sale_price');
            }])
            ->get();

        foreach ($orders as $order) {
            $total_price = 0;
            foreach ($order->products as $product) {
                $total_price += $product->sale_price;
            }
            $order->total_price = $total_price;
        }

        return view('/my-orders', ['orders' => $orders]);
    }
}
