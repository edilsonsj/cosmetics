@extends('layouts.welcome-template')

@section('title', 'Catálogo Online')

@section('content')

    <div class="gallery">

        @foreach ($products as $product)
            <figure style="border: solid 1px #e4e4e4; border-radius: 5px;">
                <img src="/img/products/{{ $product->product_image_path }}" class="gallery__img"
                    alt="{{ $product->product_name }}">
                <figcaption class="gallery__caption">
                    <p class="gallery__comment">{{ $product->product_name }}</p>
                    <span class="gallery__price">R$ {{ $product->product_price }}</span>
                    <form action="{{ route('products.addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button     type="submit" class="gallery__button">
                          <i class='bx bx-cart'></i> 
                          Adicionar ao carrinho
                        </button>
                    </form>
                </figcaption>
            </figure>
        @endforeach

    @endsection
