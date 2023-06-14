@extends('layouts.app')

@section('content')
    <div class="contenido col-12 col-md-9">
        <h1 class="mb-5 mt-4"><strong>HOLA, {{ Auth::user()->name }}</strong></h1>

                @auth
                @if(@Auth::user()->hasRole('admin'))

                <div style="min-width: 351px;width: 351px">
                    <a href="{{ route('pedidos.mostrarVentas') }}" style="text-decoration: none;color: initial">
                        <h4>Mis ventas</h4>
                        <p>Rastrea tus ventas aquí.</p>
                    </a>
                    <hr>
                </div>
                
                @else

                <div style="min-width: 351px;width: 351px">
                    <a href="{{route('pedidos.mostrarPedidos')}}" style="text-decoration: none;color: initial">
                        <h4>Mis Pedidos</h4>
                        <p>Rastrea tus pedidos aquí.</p>
                    </a>
                    <hr>
                </div>
                @endif
                @endauth

        <div style="min-width: 351px;width: 351px">
            <a href="{{route('users.detallesPersonales')}}" style="text-decoration: none;color: initial">
                <h4>Detalles Personales</h4>
                <p>Edite aquí sus datos personales, como la dirección de entrega por defecto y el nombre.</p>
            </a>
            <hr>
        </div>

        <div style="min-width: 351px;width: 351px">
            <a href="{{route('users.cambiarContrasena')}}" style="text-decoration: none;color: initial">
                <h4>Cambiar la contraseña</h4>
                <p>Cambie su contraseña aquí.</p>
            </a>
            <hr>
        </div>

        <div class="mt-5" style="min-width: 351px;width: 351px">
            <a href="{{ route('logout') }}" id="buttomLogin"  style="font-size:21px;" class="fw-bold w-100 btn bg-warning justify-content-center" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </div>
@endsection

