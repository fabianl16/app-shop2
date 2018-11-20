@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Datos de perfil</h2>

            <div class="row">
                <div class="col-md-3">
                    <label>Nombre completo</label>
                </div>
                <div class="col-md-3">
                    {{$user->name}}
                </div>
                
            </div>
             <div class="row">
                <div class="col-md-3">
                    <label>Nombre de usuario</label>
                </div>
                <div class="col-md-3">
                    {{$user->username}}
                </div>
                
            </div>
             <div class="row">
                <div class="col-md-3">
                    <label>Telefono</label>
                </div>
                <div class="col-md-3">
                    {{$user->phone}}
                </div>
                
            </div>
             <div class="row">
                <div class="col-md-3">
                    <label>Direccion</label>
                </div>
                <div class="col-md-3">
                    {{$user->address}}
                </div>
                
            </div>
             <div class="col-md-2">
            <a href="/edit/mi-perfil" class="btn btn-info" style="border-radius:20px;">Editar perfil</a>
</div>






           
        </div>

    </div>
</div>

@include('includes.footer')
@endsection
