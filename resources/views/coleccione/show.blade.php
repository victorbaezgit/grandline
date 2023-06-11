@extends('layouts.app')

@section('template_title')
    {{ $coleccione->name ?? "{{ __('Show') Coleccione" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Coleccione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('colecciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Coleccion:</strong>
                            {{ $coleccione->nombre_coleccion }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen Coleccion:</strong>
                            {{ $coleccione->imagen_coleccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
