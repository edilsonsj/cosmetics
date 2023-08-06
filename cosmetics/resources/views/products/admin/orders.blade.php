<h1>Pedidos dos clientes</h1>

{{-- @foreach ($orders as $order)
    <p>id do pedido: {{ $order->id }}  
        --  id do cliente: {{ $order->user_id }}  
        -- status do pedido: {{ $order->status }}
    </p>
@endforeach --}}

<!-- my-orders.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Lista de Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>ID do Cliente</th>
                <th>Nome do Cliente</th>
                <th>Total</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>R$ {{ number_format($order->total_price, 2, ',', '.') }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">Detalhes</a>
                        <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">Finalizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


