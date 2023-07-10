@extends('layouts.main')

@section('title', $product->product_name)

@section('content')
    <h1>Pagina do produto: {{ $product -> product_name }}</h1>
    <p>Nome do produto: {{$product->product_name}}</p>
    <p>Preco: {{$product->product_price}}</p>
    <p>Descricao: {{$product->product_description}}</p>
    <p>Categoria: {{$product->product_category}}</p>
    <img src="/img/products/{{$product->product_image_path}}" alt="{{ $product -> product_name }}">
    <br>
    <input type="button" value="Adicionar ao carrinho">
@endsection