<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_coleccion') }}
            {{ Form::text('nombre_coleccion', $coleccione->nombre_coleccion, ['class' => 'form-control' . ($errors->has('nombre_coleccion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Coleccion']) }}
            {!! $errors->first('nombre_coleccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group {{ $errors->has('imagen_coleccion') ? 'has-error' : '' }}">
            <label for="imagen_coleccion">Imagen colección</label>
            <input type="file" name="imagen_coleccion" class="form-control">
            <span class="text-danger">{{ $errors->first('imagen_coleccion') }}</span>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>