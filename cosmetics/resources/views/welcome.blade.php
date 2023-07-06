@extends('layouts.main')

@section('title', 'Catálogo')

@section('content')


    @foreach ($products as $product)
        <p>
            <img src="img/products/{{$product->product_image_path}}" alt="" style="width:50px">
            <br>
            Produto: <a href="/products/{{$product->id}}">{{ $product -> product_name }} </a>
            <span>/ Preço: {{ $product->product_price }} </span>
        </p>

    @endforeach

@endsection