<h1>MEUS PEDIDOS</h1>

@foreach ($orders as $order)
    {{-- <p>num. do pedido: {{ $order->id }}  -   </p> --}}
    <p>{{$order}}</p>
@endforeach