@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-5" style="align-items: center;display: flex;flex-direction: column;">RESTABLECER CONTRASEÑA</h1>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('users.actualizarPassword') }}">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" name="token" value="{{ $token }}">




                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña"> 

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <input type="hidden" name="enviaremail" value="enviaremail">

                        <div class="row justify-content-cente">
                            <div class="col-md-6">
                                <hr>
                                <button id="buttomLogin" type="submit" class="btn bg-warning fw-bold p-3" style="width: 100%; min-width: 194px;font-size: 18px;margin-bottom: 15px">
                                    Resetear contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
        
    </div>
</div>
@endsection
