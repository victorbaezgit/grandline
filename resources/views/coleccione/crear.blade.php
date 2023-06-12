@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Coleccione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="container" style="font-family: system-ui;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;font-weight: bold;">AÑADIR COLECCIÓN</h1>
                            <div>
                                <div>
                                    <form method="POST" action="{{ route('colecciones.store') }}" role="form"enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3 justify-content-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('nombre_coleccion') }}
                                                    {{ Form::text('nombre_coleccion', $coleccione->nombre_coleccion, ['class' => 'form-control' . ($errors->has('nombre_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Coleccion']) }}
                                                    {!! $errors->first('nombre_coleccion', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row mb-3 justify-content-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('imagen_coleccion') }}
                                                    {{ Form::text('imagen_coleccion', $coleccione->imagen_coleccion, ['class' => 'form-control' . ($errors->has('imagen_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Imagen Coleccion']) }}
                                                    {!! $errors->first('imagen_coleccion', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="crearColeccion" value="crearColeccion">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <button id="buttomLogin" type="submit" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold">
                                                    Guardar Colección
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
