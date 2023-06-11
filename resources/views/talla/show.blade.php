@extends('layouts.app')

@section('template_title')
    {{ $talla->name ?? "{{ __('Show') Talla" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Talla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tallas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $talla->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Talla:</strong>
                            {{ $talla->tipo_talla }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $talla->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
