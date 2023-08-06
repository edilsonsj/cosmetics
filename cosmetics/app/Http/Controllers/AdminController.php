<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reportData = DB::table('products')
        ->select(
            'products.id',
            'products.product_image_path',
            'products.product_name',
            'products.product_price',
            'products.product_qty',
            DB::raw('COUNT(orders.id) as total_sales'),
            DB::raw('SUM(order_products.sale_price) as total_revenue')
        )
        ->leftJoin('order_products', 'products.id', '=', 'order_products.product_id')
        ->leftJoin('orders', 'order_products.order_id', '=', 'orders.id')
        ->where('orders.status', '=', 'finalizado')
        ->groupBy('products.id')
        ->get();

    return view('products.admin.dashboard', ['reportData' => $reportData]);

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
