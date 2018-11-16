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
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">list</i>
                               <div class="title">
                                   <h4>Inventario</h4>
                               </div>
                               <div class="text">
                                   <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                               </div>
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                                <i class="material-icons fa-3x">games</i>
                               <div class="title">
                                   <h4>Gestionar productos</h4>
                               </div>
                               <div class="text">
                                   <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                               </div>
                            </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">scatter_plot</i>
                               <div class="title">
                                   <h4>Gestionar categorias</h4>
                               </div>
                               <div class="text">
                                   <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                               </div>
                            </div>
                       </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">scatter_plot</i>
                               <div class="title">
                                   <h4>Gestionar categorias</h4>
                               </div>
                               <div class="text">
                                   <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                               </div>
                            </div>
                       </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="box-part text-center">
                               <i class="material-icons fa-3x">assignment_late</i>
                               <div class="title">
                                   <h4>Pedidos por finalizar</h4>
                               </div>
                               <div class="text">
                                   <span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
                               </div>
                            </div>
                       </div>
  
  
</div>

</div>
</div>

@include('includes.footer')
@endsection
