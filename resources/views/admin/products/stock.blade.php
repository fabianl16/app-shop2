@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Ingresa cantidad de producto</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/products/'.$product->id.'/stock') }}">
                {{ csrf_field() }}
                <div class="col-sm-6">
                        <div class="form-group label-floating">
                        <label class="control-label">Cantidad de productp</label>
                        <input type="number" step="0" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
                        </div>
                    </div>
                </div>
                </div>

                <button class="btn btn-primary">Guardar cambios</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection
