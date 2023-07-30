@extends('layouts.welcome-template')

@section('title', 'Catálogo Online')

@section('content')
    
<div class="gallery">

  @foreach ($products as $product)
      
      <figure style="border: solid 1px #e4e4e4; border-radius: 5px;">
        <img src="/img/products/{{$product->product_image_path}}" class="gallery__img" alt="{{$product->product_name}}">
        <figcaption class="gallery__caption">
          <p class="gallery__comment">{{$product->product_name}}</p>
          <span class="gallery__price">R$ {{$product->product_price}}</span>
          <button class="gallery__button" data-id="1"><i class='bx bx-cart'></i> Adicionar ao carrinho</button>
        </figcaption>
      </figure>
  
  @endforeach
@endsection
