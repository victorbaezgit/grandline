@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container">
        @Auth
    @if(Auth::user()->hasRole('admin'))
    <a href="{{route('colecciones.crear')}}" id="buttomLogin" style="width: 15%; min-width: 194px;font-size: 17px" class="bg-warning btn mb-3">+ Añadir Colección</a>
    @endif
    @endAuth
        <div class="row justify-content-md-center justify-content-sm-center">
            
            @if ($message = Session::get('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ $message }}</p>
                        </div>
            @endif

            @php
                $contador=0;
            @endphp
            @foreach ($colecciones as $coleccion)
            @php
                $contador++;
            @endphp
                    <div class="{{$contador <= 2 ? 'col-sm-6' : 'col-sm-3' ;}} carta" style="margin-bottom:10px;">
                        <a class="imagen" href="{{route('productos.listaProductos',$coleccion->id)}}" style="position: relative;">
                            
                            <img style="width: 100%;height:100%;" src="{{ $coleccion->imagen_coleccion }}">

                            <div class="infobox">
                                <div class="info">
                                    <h1 class="name">{{$coleccion->nombre_coleccion}}</h1>
                                </div>
                            </div>

                            @Auth
                            @if(Auth::user()->hasRole('admin'))
                            <div class="menu">

                                <div class="infoMenu">

                                    <form action="{{route('colecciones.destroy',$coleccion->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="borrarColeccion" value="borrarColeccion">
                                        <button class="eliminarX" type="submit" style="background-color:white;border:none;color: red;font-weight: 700;text-decoration: none;font-size: 20px"><i class="fa fa-fw fa-trash"></i> {{ __('X') }}</button>
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
