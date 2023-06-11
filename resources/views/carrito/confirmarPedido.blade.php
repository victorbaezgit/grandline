@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Comprar
@endsection

@section('content')
<div class="bg-light">
    <div class="container">
            <h1 class="pago mb-5">PAGO</h1>
        <form method="POST" action="{{route('carritos.hacerPedido')}}">
            @csrf
            <div class="contenedorProducto">
                <div class="direccionDeEntrega">
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                        <label for="floatingName">Email</label>
                        @if ($errors->has('email'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('email') }}</span>
                            <br>
                        @endif
                    </div>

                    <h2>Dirección de entrega</h2>


                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" placeholder="Nombre">
                        <label for="floatingName">Nombre</label>
                        @if ($errors->has('name'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('name') }}</span>
                            <br>
                        @endif
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="surname" value="{{ Auth::user()->surname }}" placeholder="Apellidos">
                        <label for="floatingName">Apellidos</label>
                        @if ($errors->has('surname'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('surname') }}</span>
                            <br>
                        @endif
                    </div>

                  <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="direccion" value="{{ Auth::user()->direccion !== null ? Auth::user()->direccion : old('direccion')}}" placeholder="Dirección" >
                        <label for="floatingName">Dirección</label>
                        @if ($errors->has('direccion'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('direccion') }}</span>
                            <br>
                        @endif
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="codigoPostal" value="{{ Auth::user()->codigoPostal !== null ? Auth::user()->codigoPostal : old('codigoPostal')}}" placeholder="Código postal" >
                        <label for="floatingName">Código postal</label>
                        @if ($errors->has('codigoPostal'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('codigoPostal') }}</span>
                            <br>
                        @endif
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="localidad" value="{{ Auth::user()->localidad !== null ? Auth::user()->localidad : old('localidad')}}" placeholder="Localidad" >
                        <label for="floatingName">Localidad</label>
                        @if ($errors->has('localidad'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('localidad') }}</span>
                            <br>
                        @endif
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="pais" value="{{ Auth::user()->pais !== null ? Auth::user()->pais : old('pais')}}" placeholder="País" >
                        <label for="floatingName">País</label>
                        @if ($errors->has('pais'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('pais') }}</span>
                            <br>
                        @endif
                    </div>


                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="telefono" value="{{ Auth::user()->telefono !== null ? Auth::user()->telefono : old('telefono')}}" placeholder="Teléfono">
                        <label for="floatingName">Teléfono</label>
                        @if ($errors->has('telefono'))
                            <span class="text-danger" style="float: left;text-align: left;">{{ $errors->first('telefono') }}</span>
                            <br>
                        @endif
                    </div>



                </div>

                <div style="width: 100%;">
                        <div class="precioTotal" style="display: flex;justify-content: space-between;width: 100%;">
                            <p style="font-size: 20px">Total</p>
                            @if($precioTotal == null)
                                <p style="font-size: 20px" id="precioTotal">{{old('precioTotal')}}€</p>
                            @else
                            <p style="font-size: 20px" id="precioTotal">{{$precioTotal}}€</p>
                            @endif
                        </div>
                    @if($precioTotal == null)
                        <input type="hidden" name="precioTotal" value="{{old('precioTotal')}}">
                    @else
                        <input type="hidden" name="precioTotal" value="{{$precioTotal}}">
                    @endif

                        <div>
                            <button type="submit" id="buttomLogin" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="finalizarComopra btn bg-warning fw-bold">Finalizar Pedido</button>
                        </div>
                </div>

            </div>
    </form>

    </div>
</div>
@endsection
