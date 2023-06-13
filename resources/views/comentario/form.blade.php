<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group {{ $errors->has('tipo_talla') ? 'has-error' : '' }}">
            <label for="id_usuario">Usuarios</label>
            <select name="id_usuario" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($usuarios as $usuario)                       
                <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_usuario') }}</span>
        </div>
        
        <div class="form-group {{ $errors->has('tipo_talla') ? 'has-error' : '' }}">
            <label for="id_producto">Productos</label>
            <select name="id_producto" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($productos as $producto)                       
                <option value="{{$producto->id}}">{{$producto->nombre_producto}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_producto') }}</span>
        </div>

        <div class="form-group">
            {{ Form::label('contenido') }}
            {{ Form::text('contenido', $comentario->contenido, ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Contenido']) }}
            {!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>