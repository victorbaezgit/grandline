@extends('layouts.app')

@section('template_title')
    
@endsection

@section('content')
    <div class="container">
        <br><br>
        <h1>Listado usuarios</h1>
        <br>
        <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Dirección</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Localidad</th>
                <th scope="col">País</th>
                <th scope="col">Teléfono</th>
              </tr>
            </thead>
            <tbody>
                 @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->surname}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->direccion}}</td>
                        <td>{{$usuario->codigoPostal}}</td>
                        <td>{{$usuario->localidad}}</td>
                        <td>{{$usuario->pais}}</td>
                        <td>{{$usuario->telefono}}</td>
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
