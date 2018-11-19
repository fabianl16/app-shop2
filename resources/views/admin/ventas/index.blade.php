@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Panel de ventas</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

             @if (session('notification_error'))
                <div class="alert alert-danger text-center">
                    {{ session('notification_error') }}
                </div>
            @endif

            @if (session('notification_stock'))
                <div class="alert alert-danger text-center">
                    {{ session('notification_stock') }}
                </div>
            @endif

        
        
            <hr>
            <h3>Ventas</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Referencia de pago</th>
                        <th>Nombre del cliente</th>
                        <th>Fecha de acreditacion de pago</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td class="text-center">{{$venta->id}}</td>
                        <td class="text-center">$ {{ $venta->paymentId }}</td>
                        <td>{{ $venta->user->name }}</td>
                        <td>$ {{ $venta->order_date}}</td>
                        <td class="td-actions">
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

        </div>

    </div>
</div>

@include('includes.footer')
@endsection
