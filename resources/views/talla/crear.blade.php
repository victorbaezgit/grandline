@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Talla
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Talla</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tallas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <input type="hidden" name="id_producto" value="{{$producto->id}}">
                                    <input type="hidden" name="AnadirStock" value="AnadirStock">

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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
