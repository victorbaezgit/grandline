@extends('layouts.app')

@section('template_title')
    {{-- {{ $producto->name ?? "{{ __('Show') Producto" }} --}}
@endsection



@section('content')

<div class="container px-4 px-lg-5 mt-5">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    @Auth
    @if(Auth::user()->hasRole('admin'))
    <a href="{{route('productos.crear',$coleccion->id)}}" id="buttomLogin" style="width: 15%; min-width: 194px;font-size: 17px" class="bg-warning btn mb-3">+ Añadir Producto</a>
    @endif
    @endAuth
    <h1 class="text-center">{{$coleccion->nombre_coleccion}}</h1><br><br>
    <div class="container">
                
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($productos as $producto)

                    <div class="col-12 col-sm-6 col-md-3 carta" style="margin-bottom:10px;">
                        <a class="imagen" href="{{route('productos.productoIndividual',$producto->id)}}" style="position: relative;">
                            
                            <img style="width: 100%;height:100%;" src="{{ $producto->imagen_delantera }}">

                            
                            <h4 class="name text-dark mt-3">{{$coleccion->nombre_coleccion}} - {{$producto->nombre_producto}}</h4>
                            <h5 class="name text-dark fw-light">{{$producto->precio}} €</h5>

                            @Auth
                            @if(Auth::user()->hasRole('admin'))
                            <div class="menu">

                                <div class="infoMenu">

                                    <form action="{{route('productos.destroy',$producto->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="borrarProducto" value="borrarProducto">
                                        <button class="eliminarX" type="submit" style="background-color:white;border:none;color: red;font-weight: 700;text-decoration: none;font-size: 20px"><i class="fa fa-fw fa-trash"></i> {{ __('X') }}</button>
                                      </form>
                                

                                </div>
                            </div>

                            <div class="menuEditar">

                                <div class="infoMenuEditar">

                                    <form action="{{route('productos.editar', $producto->id)}}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <input type="hidden" name="borrarColeccion" value="borrarColeccion">
                                        <button type="submit" style="background-color:white;border:none;font-weight: 700;text-decoration: none;font-size: 20px"><i class="bi bi-pencil-fill"></i></button>
                                    </form>
                    
                                </div>
                            </div>

                            @endif
                            @endAuth
                        </a>
                    </div>   
            @endforeach
    </div>



@endsection
