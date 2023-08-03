<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;

class ProductController extends Controller
{

    public function index($category = null)
    {
        $query = Product::query();

        if ($category) {
            $query->where('product_category', $category);
        }

        $products = $query->get();
        $categories = DB::table('products')->select('product_category')->distinct()->get();

        return view('welcome', ['products' => $products, 'categories' => $categories]);
    }



    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {

        $product = new Product;

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_qty = $request->product_qty;
        $product->product_category = $request->product_category;
        $product->product_price = $request->product_price;

        if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {

            $request_image = $request->product_image;
            $extension = $request_image->extension();
            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request_image->move(public_path('img/products'), $image_name);

            $product->product_image_path = $image_name;
        }

        $product->save();

        return redirect('/products/admin/manage')->with('msg', 'Produto cadastrado com sucesso');
    }

    public function show($id)
    {

        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
    }


    public function edit($id)
    {

        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {

        $data = $request->all();


        if ($request->hasFile('product_image_path') && $request->file('product_image_path')->isValid()) {

            $request_image = $request->product_image_path;
            $extension = $request_image->extension();
            $image_name = md5($request_image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request_image->move(public_path('img/products'), $image_name);

            $data['product_image_path'] = $image_name;
        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/products/manage')->with('msg', 'Produto alterado com sucesso');
    }

    public function manage()
    {
        $products = Product::all();
        return view('products.admin.manage', ['products' => $products]);
    }

    public function destroy($id)
    {

        Product::findOrFail($id)->delete();
        return redirect('/products/admin/manage')->with('msg', 'Produto deletado com sucesso.');
    }

    public function cart()
    {
        $user = auth()->user();
        $products = Cart::where('user_id', $user->id)->with('product')->get();

        return view('cart', ['products' => $products, 'user' => $user]);
    }

    public function finalizeOrder(Request $request)
    {
        // Verificar se o usuário está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para finalizar a compra.');
        }

        // Obter o ID do usuário autenticado
        $user_id = auth()->user()->id;

        // Criar o pedido (registro na tabela 'orders')
        $order = new Order();
        $order->user_id = $user_id;
        $order->save();

        // Obter o carrinho do usuário
        $cart_items = Cart::where('user_id', $user_id)->get();

        // Inserir os produtos do carrinho como itens do pedido (registros na tabela 'order_products')
        foreach ($cart_items as $item) {
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $item->product_id;
            $order_product->sale_price = $item->product->product_price;
            $order_product->save();
        }

        // Limpar o carrinho do usuário após a finalização do pedido
        Cart::where('user_id', $user_id)->delete();

        return redirect('/')->with('msg', 'Pedido realizado com sucesso!');
    }

    public function addToCart(Request $request)
    {
        $user_id = auth()->id();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Verifica se o produto já está no carrinho do usuário
        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            // Se o produto já estiver no carrinho, atualiza a quantidade
            $cartItem->qty += $quantity;
            $cartItem->save();
        } else {
            // Caso contrário, cria um novo item no carrinho
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'qty' => $quantity,
            ]);
        }

        // Redireciona de volta à página inicial com uma mensagem de sucesso
        return redirect()->route('products.index')->with('msg', 'Produto adicionado ao carrinho com sucesso!');
    }

}
