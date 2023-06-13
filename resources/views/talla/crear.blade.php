@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Talla
@endsection

@section('content')


<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="container" style="font-family: system-ui;">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;font-weight: bold;">AÑADIR STOCK</h1>
                        <div>
                            <div>
                                <form method="POST" action="{{ route('tallas.store') }}" role="form"enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="id_producto" value="{{$producto->id}}">
                                    <input type="hidden" name="AnadirStock" value="AnadirStock">

                                    
                                    <div class="row mb-3 justify-content-center">
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
                                    </div>


                                    <div class="form-group">
                                        {{ Form::label('stock') }}
                                        {{ Form::text('stock', $talla->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                                        {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <button id="buttomLogin" type="submit" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold">
                                                Añadir stock
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
