<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Order;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function test () {
        $result = DB::table('users')->select('name', 'email')->get();
        return view('test', ['result' => $result]);
    }

    public function orders()
    {
        $user_id = auth()->user()->id;

        $user_orders = DB::table('orders')
            ->select(
                'orders.id',
                'orders.status'
            )->get();

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

        return view('/my-orders', ['orders' => $orders], ['user_orders' => $user_orders]);
    }


    public function accessDenied () {
        return view('access-denied');
    }
}
