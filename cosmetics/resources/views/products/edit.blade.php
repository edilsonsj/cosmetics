@extends('layouts.main')

@section('title', 'Alterando produto: ' . $product -> product_name)

@section('content')
    <h1>Formulario de modificacao de produto</h1>
    
    <form action="/products/update/{{$product -> id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="/img/products/{{$product -> product_image_path}}" alt="{{ $product -> product_name }}">
        <br>
        <label for="product_image_path">Imagem do Produto</label>
        <input type="file" name="product_image_path" id="">
        <br>
        <br>
        <label for="product_name">Nome do produto</label>
        <input type="text" name="product_name" id="" value="{{$product->product_name}}" placeholder="{{$product->product_name}}">
        <br>
        <br>
        <label for="product_description">Descrição</label>
        <textarea name="product_description" id="" cols="30" rows="10" placeholder="{{$product->product_description}}">{{$product->product_description}}
        </textarea>
        <br>
        <br>
        <label for="product_categoty">Categoria</label>
        <select name="product_category" id="">
            <option value="{{$product->product_category}}">{{$product->product_category}}</option>
            <option value="hair">Cabelo</option>
            <option value="perfumary">Perfumaria</option>
        </select>
        <br>
        <br>
        <label for="product_qty">Quantidade </label>
        <input type="number" name="product_qty" id="" min="1" value="{{$product->product_qty}}" placeholder="{{$product->product_qty}}">
        <label for="product_price">Preço de venda</label>
        <input type="number" name="product_price" id="" step="0.01" min = "0.00"  placeholder="{{$product->product_price}}" value="{{$product->product_price}}">
        <br>
        <br>
        <input type="submit" value="Salvar alteracoes">
    </form>
@endsection
