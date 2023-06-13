@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Coleccione
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="container" style="font-family: system-ui;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;font-weight: bold;">EDITAR COLECCIÓN</h1>
                        <div>
                            <div>
                                <form method="POST" action="{{ route('colecciones.update', $coleccione->id) }}" role="form"enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="row mb-3 justify-content-center">
                                        <div class="form-group col-6">
                                        {{ Form::label('nombre_coleccion') }}
                                        {{ Form::text('nombre_coleccion', $coleccione->nombre_coleccion, ['class' => 'form-control' . ($errors->has('nombre_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Coleccion']) }}
                                        {!! $errors->first('nombre_coleccion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    </div>
        
                                    <div class="row mb-3 justify-content-center">
                                        <div class="form-group col-6 {{ $errors->has('imagen_coleccion') ? 'has-error' : '' }}">
                                            <label for="imagen_coleccion">Imagen colección</label>
                                            <input type="file" name="imagen_coleccion" class="form-control">
                                            <span class="text-danger">{{ $errors->first('imagen_coleccion') }}</span>
                                        </div>
                                    </div>

                                    <input type="hidden" name="editarProducto" value="editarProducto">
                                    <input type="hidden" name="imagen_anterior" value="{{$coleccione->imagen_coleccion}}">
                                    <input type="hidden" name="nombre_anterior" value="{{$coleccione->nombre_coleccion}}">
                                    
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <button id="buttomLogin" type="submit" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold">
                                                Editar Colección
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


