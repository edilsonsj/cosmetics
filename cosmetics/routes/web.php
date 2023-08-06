<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{category?}', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/admin/manage', [ProductController::class, 'manage']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/edit/{id}', [ProductController::class, 'edit']);

Route::put('/products/update/{id}', [ProductController::class, 'update']);

Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/products/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/cart', [ProductController::class, 'cart'])->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
});


Route::post('/atualizar-quantidade', [ProductController::class, 'updateQuantity']);

Route::get('/dashboard', [UserController::class, 'dashboard']);

Route::post('finalize-order', [ProductController::class, 'finalizeOrder'])->name('finalize.order');

Route::post('add-to-cart', [ProductController::class, 'addToCart'])->name('products.addToCart')->middleware('auth');

Route::get('/products/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');

Route::get('/products/admin/orders/{id}', [AdminController::class, 'orderDetails'])->name('admin.order.details');

Route::post('/products/admin/orders/{id}/finalize', [AdminController::class, 'finalizeOrder'])->name('admin.order.finalize');

Route::get('/my-orders', [UserController::class, 'orders']);

Route::get('/test', [UserController::class, 'test']);