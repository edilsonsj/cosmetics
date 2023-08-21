<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Meu carrinho</title>
    <h1>
        <a href="/"><span class="cor1"> Catálogo </span>
            <span class="cor2"> Online </span></a>
    </h1>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap');

        .cor1 {
            color: #3734A9;
            font-size: 32px;
            font-family: 'Outfit', sans-serif;
            font-weight: 400;
            line-height: 44.99px;
            word-wrap: "break-word";
        }

        .cor2 {
            color: #002A48;
            font-size: 32px;
            font-family: 'Outfit', sans-serif;
            font-weight: 400;
            line-height: 44.99px;
            word-wrap: "break-word";
        }

        h2 {
            text-align: center;
            color: #3734A9;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }

        table {
            text-align: center;
            width: 100%;
            border-collapse: collapse;
            font-family: 'Outfit', sans-serif;
            border: 2px solid;
            border-color: #a6a6dd;

        }

        tr {
            height: 70px;
            font-family: 'Outfit', sans-serif;
        }

        /* Novo estilo para o botão "Finalizar Compra" */
        .btn-finalizar {
            display: block;
            width: 100%;
            padding: 10px;
            font-family: 'Outfit', sans-serif;
            background-color: #3734A9;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
    <div style="width: 100%; height: 30px; background: #f1f1ff; border: 0.50px #EFEFEF solid"></div>
    <h2><b>Olá {{ $user->name }}! Este são os produtos do seu carrinho</b></h2>
</head>

@if (session('msg'))
    <div class="msg"
        style="background: green; color:greenyellow; border-radius:3px; width:100%; height: 30px; margin:5px;">
        <p class="msg">{{ session('msg') }}</p>
    </div>
@endif

<body>
    <table border="1">
        <tr bgcolor=#a6a6dd>
            <td>
                <font color="white"><b>ID</b></font>
            </td>
            <td>
                <font color="white"><b>Imagem</b></font>
            </td>
            <td>
                <font color="white"><b>Nome</b></font>
            </td>
            <td>
                <font color="white"><b>Preço</b></font>
            </td>
            <td>
                <font color="white"><b>Quantidade</b></font>
            </td>
            <td>
                <font color="white"><b>Total</b></font>
            </td>
            <td>
                <font color="white"><b>Ação</b></font>
            </td>
        </tr>
        @php
            $total_price = 0;
        @endphp
        @foreach ($products as $product)
            @php
                $subtotal = $product->product->product_price * $product->qty;
                $total_price += $subtotal;
            @endphp
            <tr>
                <td>
                    <font color=#a6a6dd>{{ $product->product->id }}</font>
                </td>
                <td><img src="img/products/{{ $product->product->product_image_path }}" style="width: 5vw"></td>
                <td>{{ $product->product->product_name }}</td>
                <td>
                    <font color=#a6a6dd><b>R$ {{ $product->product->product_price }}</b></font>
                </td>

                <td>
                    {{ $product->qty }}
                </td>

                <td style="color: #002A48; font-weight: bold;">
                    R$ {{ $subtotal }}
                </td>
                <td>
                    <form action="/cart/{{ $product->product_id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Excluir"
                            style="appearance: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            background-color: transparent;
                            border: none;
                            padding: 0;
                            margin: 0;
                            cursor: pointer;
                            color: #ff4800;
                            font-family: 'Outfit', sans-serif;
                            font-size: 18px;
                            font-style: normal;
                            font-weight: 500;
                            line-height: normal;
                            text-decoration: underline;"
                            class="btn-excluir">
                    </form>
                </td>

            </tr>
        @endforeach
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>@php
                echo $total_price;
            @endphp</td>
        </tr>
    </table>

    @if ($total_price > 0)
        <form action="{{ route('finalize.order') }}" method="post">
            @csrf

            @foreach ($products as $product)
                <input type="hidden" name="qty" value="{{ $product->qty }}">
            @endforeach

            <button type="submit" class="btn-finalizar">Fazer pedido</button>
        </form>
    @endif

</body>

</html>
