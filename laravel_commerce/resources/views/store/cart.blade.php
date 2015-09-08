@extends('store.store')

@section('content')

    <section id="cart_items">
        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"> </td>
                            <td> </td>
                            <td class="price">Valor</td>
                            <td> </td>
                            <td class="price">Quantidade</td>
                            <td> </td>
                            <td class="price">Total</td>
                            <td> </td>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id'=>$k]) }}">
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="80" />
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Codigo: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>
                            <td class="cart_quantity">
                                {{ $item['qtd'] }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="cart_product" colspan="9">
                                <p>Nenhum item Encontrado.</p>
                            </td>
                        </tr>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="9">
                            <div class="pull-right">
                                <span style="margin-right: 135px">
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>

                                <a href="#" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop