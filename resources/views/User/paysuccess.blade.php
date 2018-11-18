@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <div class="name">
                        <h3 class="title">Algo salio mal...</h3>
                    </div>


                </div>
                </div>
           
              


                
            </div> 

        </div>
    </div>
</div>
      

@include('includes.footer')
@endsection
