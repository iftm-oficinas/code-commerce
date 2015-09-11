@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="contaier">
        @if($cart == 'empty')
            <h3>Carrinho de compras vasio</h3>
        @else
            <h3>Pedido realizado com sucesso!</h3>
            <p>O pedido #{{ $order->id }}, foi realizado com sucesso.</p>
        @endif
        <br>
        <br>
        <br>
    </div>
@stop