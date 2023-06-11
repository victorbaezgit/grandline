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
        <div class="form-group">
            {{ Form::label('imagen_delantera') }}
            {{ Form::text('imagen_delantera', $producto->imagen_delantera, ['class' => 'form-control' . ($errors->has('imagen_delantera') ? ' is-invalid' : ''), 'placeholder' => 'Imagen Delantera']) }}
            {!! $errors->first('imagen_delantera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen_trasera') }}
            {{ Form::text('imagen_trasera', $producto->imagen_trasera, ['class' => 'form-control' . ($errors->has('imagen_trasera') ? ' is-invalid' : ''), 'placeholder' => 'Imagen Trasera']) }}
            {!! $errors->first('imagen_trasera', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>