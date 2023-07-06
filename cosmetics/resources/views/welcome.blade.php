@extends('layouts.main')

@section('title', 'Catálogo')

@section('content')


    @foreach ($products as $product)
        <p>Produto: {{ $product -> product_name }} <span>/ Preço: {{ $product->product_price }} </span></p>
    @endforeach

@endsection