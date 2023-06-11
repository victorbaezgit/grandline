@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container">
        <div class="row justify-content-md-center justify-content-sm-center">
            @php
                $contador=0;
            @endphp
            @foreach ($colecciones as $coleccion)
            @php
                $contador++;
            @endphp
                    <div class="{{$contador <= 2 ? 'col-sm-6' : 'col-sm-3' ;}} carta" style="margin-bottom:10px;">
                        <a class="imagen" href="{{route('productos.listaProductos',$coleccion->id)}}" style="position: relative;">
                            
                            <img style="width: 100%;height:100%;" src="{{ URL::to("/$coleccion->imagen_coleccion") }}">

                            <div class="infobox">
                                <div class="info">
                                    <h1 class="name">{{$coleccion->nombre_coleccion}}</h1>
                                </div>
                            </div>
                        </a>
                    </div>   
            @endforeach
           
</div>
@endsection
