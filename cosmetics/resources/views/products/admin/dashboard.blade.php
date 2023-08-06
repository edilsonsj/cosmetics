<!DOCTYPE html>
<html>
<head>
    <h1>
        <a href="/"><span class="cor1"> Catálogo </span>
            <span class="cor2"> Online </span></a>
    </h1>
    <meta charset="UTF-8">
    <title>Relatório de Produtos</title>
    <!-- Importação das fontes do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" rel="stylesheet">
    <style>

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

        
        /* Estilo para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Estilo para o cabeçalho da tabela */
        th {
            background-color: #a6a6dd;
            color: white;
            height: 40px;
            text-align: center;
            padding: 10px;
        }

        /* Estilo para as células da tabela */
        td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #a6a6dd;
        }

        /* Estilo para a imagem */
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }

        /* Estilo para os textos com a fonte personalizada */
        h1, th, td {
            font-family: 'Outfit', sans-serif;
        }

        /* Estilo para o cabeçalho h1 */
        h1 {
            color: #3734A9;
            font-size: 32px;
            font-weight: 400;
            line-height: 44.99px;
            word-wrap: "break-word";
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Relatório de Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Qte em Estoque</th>
                <th>Qtd de Vendas</th>
                <th>Receita</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportData as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="/img/products/{{ $product->product_image_path }}" class="product-image"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>R$ {{ $product->product_price }}</td>
                    <td>{{ $product->product_qty }}</td>
                    <td>{{ $product->total_sales }}</td>
                    <td>R$ {{ $product->total_revenue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
