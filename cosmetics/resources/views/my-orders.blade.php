<!-- Sua View Blade -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pedidos dos Clientes</title>

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

        /* Estilo para o cabeçalho da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Outfit', sans-serif;
            border: 2px solid;
            border-color: #a6a6dd;
        }

        th, td {
            border: 2px solid;
            border-color: #a6a6dd;
            padding: 10px;
            text-align: center;
        }

        thead {
            background-color: #a6a6dd;
            color: #fff;
        }

        /* Estilo para a lista de produtos */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Status</th>
                <th>Data do Pedido</th>
                <th>Total</th>
                <th>Produtos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>R$ {{ $order->total_price }}</td>
                    <td>
                        <ul>
                            @foreach ($order->products as $product)
                                <li>{{ $product->product_name }} - R$ {{ $product->product_price }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
