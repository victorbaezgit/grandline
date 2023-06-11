@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? "{{ __('Show') Pedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $pedido->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Total:</strong>
                            {{ $pedido->precio_total }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $pedido->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Codigopostal:</strong>
                            {{ $pedido->codigoPostal }}
                        </div>
                        <div class="form-group">
                            <strong>Localidad:</strong>
                            {{ $pedido->localidad }}
                        </div>
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $pedido->pais }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $pedido->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Compra:</strong>
                            {{ $pedido->fecha_compra }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
