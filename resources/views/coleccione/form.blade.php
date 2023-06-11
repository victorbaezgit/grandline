<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_coleccion') }}
            {{ Form::text('nombre_coleccion', $coleccione->nombre_coleccion, ['class' => 'form-control' . ($errors->has('nombre_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Coleccion']) }}
            {!! $errors->first('nombre_coleccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen_coleccion') }}
            {{ Form::text('imagen_coleccion', $coleccione->imagen_coleccion, ['class' => 'form-control' . ($errors->has('imagen_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Imagen Coleccion']) }}
            {!! $errors->first('imagen_coleccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>