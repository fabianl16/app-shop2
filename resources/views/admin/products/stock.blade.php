@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Inventario</h2>

            <div class="team">
                <div class="row">
                    

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-2 text-center">Consola</th>
                                <th class="col-md-2 text-center">Cantidad disponible</th>
                                <th class="col-md-2 text-center">Cantidad vendida</th>
                                <th class="col-md-2 text-center">Precio Actual</th>
                                <th class="col-md-2 text-right">Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->console->name }}</td>
                                <td class="text-center"> {{ $product->stock }}</td>
                                <td class="text-center"> {{ $product->sold }}</td>
                                <td class="text-center"> ${{ $product->price }}</td>
                                <td class="td-actions text-right">
                                    
                        
                                        
                                        <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        
                                        
                                                                        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
