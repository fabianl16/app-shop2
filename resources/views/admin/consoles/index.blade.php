@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de consolas</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/consoles/create') }}" class="btn btn-primary btn-round">Nueva consola</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th>Imagen</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consoles as $key => $console)
                            <tr>
                                <td>{{ $console->name }}</td>
                                <td>{{ $console->description }}</td>
                                <td>
                                    <img src="{{ $console->featured_image_url }}" height="50">
                                </td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/consoles/'.$console->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="#" rel="tooltip" title="Ver consola" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/consoles/'.$console->id.'/edit') }}" rel="tooltip" title="Editar consola" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $consoles->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
