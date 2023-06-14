@extends('layouts.app')

@section('template_title')
    
@endsection

@section('content')
    <div class="container">
        <br><br>
        <h1>Pedidos</h1>
        <br>
        <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">Id Pedido</th>
                @Auth
                  @if(@Auth::user()->hasRole('admin'))
                  <th scope="col">Usuario</th>           
                  @endif
                @endAuth 
                <th scope="col">Direccion</th>
                <th scope="col">Codigo Postal</th>
                <th scope="col">Localidad</th>
                <th scope="col">Pais</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha Compra</th>
                <th scope="col">Productos</th>
                <th scope="col">Precio Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        @Auth
                          @if(@Auth::user()->hasRole('admin'))
                          <td>{{$pedido->user['name']}} - ({{$pedido->user['id']}})</td>           
                          @endif
                        @endAuth 
                        <td>{{$pedido->direccion}}</td>
                        <td>{{$pedido->codigoPostal}}</td>
                        <td>{{$pedido->localidad}}</td>
                        <td>{{$pedido->pais}}</td>
                        <td>{{$pedido->telefono}}</td>
                        <td>{{$pedido->fecha_compra}}</td>
                        <td><a href="{{route('unionPedidos.mostrarProductosPedido', $pedido->id)}}">Ver productos</a></td>
                        <td>{{$pedido->precio_total}}€</td>
                    </tr>
                    
                @endforeach
            </tbody>
          </table>
    </div>


@endsection

