@extends('layouts.app')

@section('template_title')
    
@endsection

@section('content')
    <div class="container">
        <br><br>
        <h1>Productos del pedido ID: {{$unionpedidos[0]->id_pedido}}</h1>
        <br>
        <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Talla</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Unitario</th>
              </tr>
            </thead>
            <tbody>
                 @foreach ($unionpedidos as $unionpedido)
                    <tr>
                        <td class="text-center">
                        <a href="{{route('productos.productoIndividual', $unionpedido->producto->id)}}"><img src="{{ URL::to("/".$unionpedido->producto->imagen_delantera."") }}" alt="" style="width:100px;"></a>         
                        </td>
                        <td>{{$unionpedido->talla}}</td>
                        <td>{{$unionpedido->cantidad}}</td>
                        <td>{{$unionpedido->precio_unitario}}€</td>
                    </tr>
                    
                @endforeach 
            </tbody>
          </table>
    </div>


@endsection

@section('scripts')

<script>

   

</script>



@endsection
