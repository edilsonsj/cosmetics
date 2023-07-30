<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function index($category = null)
    {
        $query = Product::query();

        // Se houver categoria selecionada, filtre os produtos por essa categoria
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

        return redirect('/products/manage')->with('msg', 'Produto cadastrado com sucesso');
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
        return redirect('/products/manage')->with('msg', 'Produto deletado com sucesso.');
    }
}
