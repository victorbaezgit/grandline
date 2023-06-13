<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="form-group {{ $errors->has('tipo_talla') ? 'has-error' : '' }}">
            <label for="id_producto">Producto</label>
            <select name="id_producto" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($productos as $producto)                       
                <option value="{{$producto->id}}">{{$producto->nombre_producto}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('id_producto') }}</span>
        </div>
        
        <div class="form-group {{ $errors->has('tipo_talla') ? 'has-error' : '' }}">
            <label for="tipo_talla">Talla</label>
            <select name="tipo_talla" class="form-control">
                <option value="" selected>Seleccionar</option>
                @foreach ($tallasTotal as $tallaTotal)                       
                <option value="{{$tallaTotal}}">{{$tallaTotal}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('tipo_talla') }}</span>
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $talla->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>