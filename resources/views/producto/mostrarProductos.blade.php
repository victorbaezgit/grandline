@extends('layouts.app')

@section('template_title')
    {{-- {{ $producto->name ?? "{{ __('Show') Producto" }} --}}
@endsection



@section('content')

<div class="container px-4 px-lg-5 mt-5">

    
    <h1 class="text-center">{{$coleccion->nombre_coleccion}}</h1><br><br>
    <div class="container">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productos as $producto)

                    <div class="col-12 col-sm-6 col-md-3 carta" style="margin-bottom:10px;">
                        <a class="imagen" href="{{route('productos.productoIndividual',$producto->id)}}" style="position: relative;">
                            
                            <img style="width: 100%;height:100%;" src="{{ URL::to("/$producto->imagen_delantera") }}">

                            
                            <h4 class="name text-dark mt-3">{{$coleccion->nombre_coleccion}} - {{$producto->nombre_producto}}</h4>
                            <h5 class="name text-dark fw-light">{{$producto->precio}} €</h5>

                        </a>
                    </div>   
            @endforeach
    </div>



@endsection
