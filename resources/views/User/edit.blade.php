@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Datos de perfil</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/update/mi-perfil') }}">
                {{ csrf_field() }}

                @if (session('notification_error'))
                        <div class="alert alert-danger">
                            {{ session('notification_error') }}
                        </div>
                    @endif
                    @if (session('notification'))
                        <div class="alert alert-danger">
                            {{ session('notification') }}
                        </div>
                    @endif

                <div class="row">
                   <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Direccion</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de usuario</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" name="addres" value="{{ old('email', $user->email) }}">
                        </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Telefono</label>
                            <input type="phone" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>


                     </div>


                <button class="btn btn-primary">Actualizar informacion</button>
                <a href="{{ url('/mi-perfil') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>
</div>

@include('includes.footer')
@endsection
