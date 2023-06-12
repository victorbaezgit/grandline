<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_coleccion') }}
            {{ Form::text('id_coleccion', $producto->id_coleccion, ['class' => 'form-control' . ($errors->has('id_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Id Coleccion']) }}
            {!! $errors->first('id_coleccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
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