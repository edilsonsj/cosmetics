<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('products/admin/dashboard');
    }

    
    public function orders () {
        $orders = Order::with('user')->get();

        foreach ($orders as $order) {
            $total_price = $order->products()->sum('sale_price');
            $order->total_price = $total_price;
        }
        return view('products.admin.orders', ['orders' => $orders]);
    }

    public function orderDetails ($id) {
        $order = Order::findOrFail($id);
        return view('products.admin.order-details', ['order' => $order]);
    }

    public function finalizeOrder ($id) {
        $order = Order::findOrFail($id);
        $order->status = 'Finalizado';
        $order->save();

        return redirect()->route('admin.orders')->with('msg', 'Pedido finalizado com sucesso');
    }
}
