@foreach ($orders as $order)
    <p>id do pedido: {{ $order->id }}  --  id do cliente: {{ $order->user_id }}</p>
@endforeach