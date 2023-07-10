@extends('layouts.main')

@section('title', 'Catálogo')

@section('content')

    

    <h1>Tela de Gerenciamento de produto</h1>

    @foreach ($products as $product)
    <p style="border: 1px solid grey; padding: 5px">
        <img src="/img/products/{{$product->product_image_path}}" alt="" style="width:50px">
            Produto: <a href="/products/{{$product->id}}">{{ $product -> product_name }} </a>
            <span>/ Preço: {{ $product->product_price }} </span>
            <span>
                
                <button type="submit" style="display:inline-block"><a href="/products/edit/ {{$product -> id}}">Alterar</a></button>
                
                <form action="/products/{{$product->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="display:inline-block">Excluir</button>
                </form>

            </span>
            
            
        </p>

    @endforeach

@endsection