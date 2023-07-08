@extends('layouts.main')

@section('title', 'Gerenciar produtos')

@section('content')

    <h1>Tela de Gerenciamento de Produto</h1>

    @foreach ($products as $product)
        <h2 style="border: 1px solid grey; padding: 5px">
            <img src="img/products/{{$product->product_image_path}}" alt="" style="width:50px">
            Produto: <a href="/products/{{$product->id}}">{{ $product -> product_name }} </a>
            <span>/ Preço: {{ $product->product_price }} </span>
        </h2>

    @endforeach

@endsection