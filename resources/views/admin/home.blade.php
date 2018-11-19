@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

@section('styles')
    <style>
    
    span{
        font-size:15px;
    }
   .box-part a{
      text-decoration:none; 
      color: #0062cc;
      border-bottom:2px solid #0062cc;
    }
    .box{
        padding:60px 0px;
    }
    
    .box-part{
        background:#FFF;
        border-radius:0;
        padding:60px 10px;
        margin:30px 0px;
        border-radius: 12px;
    }
    .text{
        margin:20px 0px;
    }
    
    .box-part .fa{
         color:#4183D7;
    }
</style>
@endsection


<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">

<div class="section">
  <h2 class="title text-center">Panel de administrador</h2>

    <div class="row">

      <a href="{{ url('/admin/products/stock') }}">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">list</i>
                               <div class="title">
                                   <h4>Inventario</h4>
                               </div>
                               <div class="text" style="color:#000">
                                   <span>Ten acceso a tus ventas y cantidad de cada producto disponibles para vender en la pagina  web.</span>
                               </div>
                            </div>
                       </div>
                         </a>



                       
                       <a href="{{url('/admin/ventas')}}">   
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">add_alert</i>
                               <div class="title">
                                   <h4>Ventas</h4>
                               </div>
                               <div class="text" style="color:#000">
                                   <span>Ten un registro de ventas que se asocian a cada cliente que hizo una compra</span>
                               </div>
                            </div>
                       </div>  
                        </a>

                        <a href="{{ url('/admin/products') }}">
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                                <i class="material-icons fa-3x">games</i>
                               <div class="title">
                                   <h4>Gestionar productos</h4>
                               </div>
                               <div class="text" style="color:#000">
                                   <span>Accede a cada producto y editalo segun tu necesidad tambien podras cambiar la cantidad de productos disponibles para vender.</span>
                               </div>
                            </div>
                            </div>


                        </a>


                           <a href="{{ url('/admin/categories') }}">
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">scatter_plot</i>
                               <div class="title">
                                   <h4>Gestionar categorias</h4>
                               </div>
                               <div class="text" style="color:#000">
                                   <span>En este apartado podras crear y editar categorias que se asocian a tus productos.</span>
                               </div>
                            </div>
                       </div>

                           </a>

                          <a href="{{ url('/admin/consoles') }}">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">group_work</i>
                               <div class="title">
                                   <h4>Gestionar consolas</h4>
                               </div>
                               <div class="text" style="color:#000">
                                   <span>Accede aqui para editar y crear nuevas consolas que se asociaran a tus productos.</span>
                               </div>
                            </div>
                       </div>

                          </a>
                       
                       
                        

                       
  
</div>

</div>
</div>

@include('includes.footer')
@endsection
