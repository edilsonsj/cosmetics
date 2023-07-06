@extends('layouts.main')

@section('title', 'Cadastrar Produto')

@section('content')
    <h1>Formulario de cadastro de produto</h1>
    
    <form action="/products" method="post" enctype="multipart/form-data">
        @csrf
        <label for="product_image">Imagem do Produto</label>
        <input type="file" name="product_image" id="">
        <br>
        <br>
        <label for="product_name">Nome do produto</label>
        <input type="text" name="product_name" id="">
        <br>
        <br>
        <label for="product_description">Descrição</label>
        <textarea name="product_description" id="" cols="30" rows="10"></textarea>
        <br>
        <br>
        <label for="product_categoty">Categoria</label>
        <select name="product_category" id="">
            <option value="">Escolha uma opção</option>
            <option value="hair">Cabelo</option>
            <option value="perfumary">Perfumaria</option>
        </select>
        <br>
        <br>
        <label for="product_qty">Quantidade </label>
        <input type="number" name="product_qty" id="" min="1">
        <label for="product_price">Preço de venda</label>
        <input type="number" name="product_price" id="" step="0.01" min = "0.00">
        <br>
        <br>
        <input type="submit" value="Cadastrar produto">
    </form>
@endsection
