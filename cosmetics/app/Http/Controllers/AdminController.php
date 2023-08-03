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

    public function orders()
    {
        $orders = Order::all();
        return view('products.admin.orders', ['orders'  => $orders]);
    }
}
