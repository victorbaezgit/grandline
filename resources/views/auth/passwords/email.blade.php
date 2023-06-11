@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;">RESTABLECER CONTRASEÑA</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <hr>
                                <button id="buttomLogin" type="submit" class="btn bg-warning fw-bold p-3" style="width: 100%; min-width: 194px;font-size: 18px;margin-bottom: 15px">
                                    Enviar enlace de restablecimiento
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
