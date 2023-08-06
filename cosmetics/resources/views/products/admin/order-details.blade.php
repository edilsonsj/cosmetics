
    <h1>Detalhes do Pedido #{{ $order->id }}</h1>
    <p>ID do Cliente: {{ $order->user->id }}</p>
    <p>Nome do Cliente: {{ $order->user->name }}</p>
    <p>Total: {{ $order->total_price }}</p>
    <p>Data: {{ $order->created_at }}</p>
    <h2>Produtos:</h2>
    <ul>
        @foreach ($order->products as $product)
            <li>{{ $product->product_name }} - R$ {{ $product->pivot->sale_price }}</li>
        @endforeach
    </ul>

