@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                   
                                    <input type="hidden" name="id_coleccion" value="{{$producto->coleccione['id']}}">
                                    <input type="hidden" name="editarProducto" value="editarProducto">
                                    
                                    <div class="form-group">
                                        {{ Form::label('nombre_producto') }}
                                        {{ Form::text('nombre_producto', $producto->nombre_producto, ['class' => 'form-control' . ($errors->has('nombre_producto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Producto']) }}
                                        {!! $errors->first('nombre_producto', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('precio') }}
                                        {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                                        {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcion') }}
                                        {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <div class="form-group {{ $errors->has('imagen_delantera') ? 'has-error' : '' }}">
                                            <label for="imagen_delantera">Imagen delantera</label>
                                            <input type="file" name="imagen_delantera" class="form-control">
                                            <span class="text-danger">{{ $errors->first('imagen_delantera') }}</span>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="imagen_delantera_anterior" value="{{$producto->imagen_delantera}}">
                                    <input type="hidden" name="imagen_trasera_anterior" value="{{$producto->imagen_trasera}}">
                            
                                    <div class="row mb-3 justify-content-center">
                                        <div class="form-group {{ $errors->has('imagen_trasera') ? 'has-error' : '' }}">
                                            <label for="imagen_trasera">Imagen trasera</label>
                                            <input type="file" name="imagen_trasera" class="form-control">
                                            <span class="text-danger">{{ $errors->first('imagen_trasera') }}</span>
                                        </div>
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                          

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
