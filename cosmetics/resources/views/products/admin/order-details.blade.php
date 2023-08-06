<!DOCTYPE html>
<html>

<head>
    <h1>
        <a href="/"><span class="cor1"> Catálogo </span>
            <span class="cor2"> Online </span></a>
    </h1>
    <meta charset="UTF-8">
    <title>Detalhes do Pedido #{{ $order->id }}</title>
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

        /* Estilo para o cabeçalho da página */
        h1 {
            text-align: center;
            color: #3734A9;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Estilo para os parágrafos com as informações do pedido */
        p {
            font-family: 'Outfit', sans-serif;
            font-size: 18px;
            margin: 5px;
        }

        /* Estilo para o subtítulo "Produtos" */
        h2 {
            font-family: 'Outfit', sans-serif;
            color: #3734A9;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        /* Estilo para a tabela de produtos */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Outfit', sans-serif;
            font-size: 16px;
        }

        /* Estilo para o cabeçalho da tabela */
        th {
            background-color: #a6a6dd;
            color: white;
            height: 40px;
            text-align: left;
            padding: 10px;
        }

        /* Estilo para as células da tabela */
        td {
            padding: 10px;
            border-bottom: 1px solid #a6a6dd;
        }

        /* Estilo para a imagem */
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }

        /* Estilo para o parágrafo com o total do pedido */
        .total {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: bold;
            color: #002A48;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Detalhes do Pedido #{{ $order->id }}</h1>
    <p>ID do Cliente: {{ $order->user_id }}</p>
    <p>Nome do Cliente: {{ $order->user->name }}</p>
    <p>Data: {{ $order->created_at }}</p>

    <h2>Produtos:</h2>
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($order->orderItems as $product)
                <tr>
                    <td><img src="/img/products/{{ $product->product_image_path }}" class="product-image"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>R$ {{ $product->pivot->sale_price }}</td>
                </tr>
                @php
                    $total += $product->pivot->sale_price;
                @endphp
            @endforeach
        </tbody>
    </table>

    <p class="total">Total do Pedido: R$ {{ $total }}</p>
</body>

</html>
