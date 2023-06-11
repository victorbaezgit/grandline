@extends('layouts.app')

@section('content')

    <div class="contenido col-9">
        <br><br>
        <h1 class="mb-5 mt-4" style="align-items: center;display: flex;flex-direction: column;font-weight: bold;">CAMBIAR CONTRASEÑA </h1>

                 @if ($message = Session::get('error'))
                            <div class="container alert alert-danger text-center col-6">
                                <p>{{ $message }}</p>
                            </div>            
                @elseif($message = Session::get('success'))
                            <div class="container alert alert-success text-center col-6">
                                <p>{{ $message }}</p>
                            </div>
                @endif
                

        <div>
            <div>
                <form method="POST" action="{{route('users.actualizarPassword')}}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="oldPassword" value="{{ old('oldPassword') }}" placeholder="Contraseña anterior">
                                <label for="floatingName">Contraseña anterior</label>
                                @if ($errors->has('oldPassword'))
                                    <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('oldPassword') }}</span>
                                    <br>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Contraseña nueva">
                                <label for="floatingName">Contraseña nueva</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('password') }}</span>
                                    <br>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmar contraseña nueva">
                                <label for="floatingName">Confirmar contraseña nueva</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('password_confirmation') }}</span>
                                    <br>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <button id="buttomLogin" type="submit" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold">
                                Cambiar contraseña
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

