<!DOCTYPE html>
<html>

    <h1>
        <a href="/"><span class="cor1"> Catálogo </span>
            <span class="cor2"> Online </span></a>
    </h1>
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>


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
        h1 {
            text-align: center;
            color: #3734A9;
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Outfit', sans-serif;
            border: 2px solid;
            border-color: #a6a6dd;
        }

        th,
        td {
            border: 2px solid;
            border-color: #a6a6dd;
            padding: 10px;
            text-align: center;
        }

        thead {
            background-color: #a6a6dd;
            color: #fff;
        }

        /* Estilo para o link "Detalhes" */
        a {
            text-decoration: none;
            color: #3734A9;
            font-weight: bold;
        }

        /* Estilo para o botão "Finalizar" */
        form {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: #3734A9;
            color: #fff;
            border: none;
            padding: 8px 15px;
            font-family: 'Outfit', sans-serif;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilo para o botão "Finalizar" quando estiver desabilitado */
        button:disabled {
            background-color: #a6a6dd;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <h1>Lista de Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>ID do Cliente</th>
                <th>ID do Pedido</th>
                <th>Nome do Cliente</th>
                <th>Total</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>R$ {{ $order->total_price }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.order.details', ['id' => $order->id]) }}">Detalhes</a>
                        <form action="{{ route('admin.order.finalize', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            <button type="submit" {{ $order->status === 'Finalizado' ? 'disabled' : '' }}>Finalizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
