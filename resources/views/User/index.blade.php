@extends('layouts.app')

@section('title', 'Listado de Pedidos pendientes')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de compras</h2>

            <div class="team">
                <div class="row">
                    @foreach ($carts as $cart)
                    

    <table class="table">
    <thead>
        <tr>
            <th>Pedido: {{$cart->id}}</th>
            <th>Estado: Pagado</th>
            <th>Fecha de Pedido:{{$cart->order_date}}</th>
        </tr>
    </thead>
    <hr>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Vista previa</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Cantidad</th>
                                <th>Precio</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->details as $detail)
                            <tr>
                                <td><img src="{{$detail->product->featured_image_url}}" height="50"></td>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{$detail->product->price}}</td>
                                 <td>{{ $detail->quantity * $detail->product->price  }}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endforeach

                
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
