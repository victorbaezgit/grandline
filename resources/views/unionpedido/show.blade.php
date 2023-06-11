@extends('layouts.app')

@section('template_title')
    {{ $unionpedido->name ?? "{{ __('Show') Unionpedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unionpedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unionpedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $unionpedido->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $unionpedido->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Id Pedido:</strong>
                            {{ $unionpedido->id_pedido }}
                        </div>
                        <div class="form-group">
                            <strong>Talla:</strong>
                            {{ $unionpedido->talla }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $unionpedido->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Unitario:</strong>
                            {{ $unionpedido->precio_unitario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
