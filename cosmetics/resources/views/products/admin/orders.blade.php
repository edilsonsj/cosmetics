<h1>Pedidos dos clientes</h1>

@foreach ($orders as $order)
    <p>id do pedido: {{ $order->id }}  
        --  id do cliente: {{ $order->user_id }}  
        -- status do pedido: {{ $order->status }}
    </p>
@endforeach