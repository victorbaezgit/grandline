@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="container" style="font-family: system-ui;">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;font-weight: bold;">AÑADIR PRODUCTO</h1>
                            <div>
                                <div>
                                    <form method="POST" action="{{ route('productos.store') }}" role="form"enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_coleccion" value="{{$coleccion->id}}">

                                        <div class="row mb-3 justify-content-center">
                                            <div class="form-group">
                                                {{ Form::label('nombre_producto') }}
                                                {{ Form::text('nombre_producto', $producto->nombre_producto, ['class' => 'form-control' . ($errors->has('nombre_producto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Producto']) }}
                                                {!! $errors->first('nombre_producto', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <div class="form-group">
                                                {{ Form::label('precio') }}
                                                {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                                                {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <div class="form-group">
                                                {{ Form::label('descripcion') }}
                                                {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <div class="form-group {{ $errors->has('imagen_delantera') ? 'has-error' : '' }}">
                                                <label for="imagen_delantera">Imagen delantera</label>
                                                <input type="file" name="imagen_delantera" class="form-control">
                                                <span class="text-danger">{{ $errors->first('imagen_delantera') }}</span>
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <div class="form-group {{ $errors->has('imagen_trasera') ? 'has-error' : '' }}">
                                                <label for="imagen_trasera">Imagen trasera</label>
                                                <input type="file" name="imagen_trasera" class="form-control">
                                                <span class="text-danger">{{ $errors->first('imagen_trasera') }}</span>
                                            </div>
                                        </div>

                                        <br><input type="hidden" name="crearProducto" value="crearProducto">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
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

