@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <h1>Pagina do produto</h1>
    <p>Nome do produto: {{$product->product_name}}</p>
    <p>Preco: {{$product->product_price}}</p>
    <p>Descricao: {{$product->product_description}}</p>
    <p>Categoria: {{$product->product_category}}</p>
    <img src="/img/products/{{$product->product_image_path}}" alt="">
@endsection