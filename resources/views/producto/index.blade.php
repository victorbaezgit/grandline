@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre Coleccion</th>
										<th>Nombre Producto</th>
										<th>Precio</th>
										<th>Descripcion</th>
										<th>Imagen Delantera</th>
										<th>Imagen Trasera</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $producto->coleccione['nombre_coleccion'] }} - id({{ $producto->coleccione['id'] }})</td>
											<td>{{ $producto->nombre_producto }} - id({{ $producto->id}})</td>
											<td>{{ $producto->precio }}</td>
											<td>
                                                @if (strlen($producto->descripcion)>50)
                                                {{substr($producto->descripcion,0,50)}}...
                                            @else
                                                {{$producto->descripcion}}
                                            @endif
                                            </td>
                                            <td>
                                            @if (strlen($producto->imagen_delantera)>50)
                                                {{substr($producto->imagen_delantera,0,50)}}...
                                            @else
                                                {{$producto->imagen_delantera}}
                                            @endif
                                            </td>
                                            <td>
                                                @if (strlen($producto->imagen_trasera)>50)
                                                    {{substr($producto->imagen_trasera,0,50)}}...
                                                @else
                                                    {{$producto->imagen_trasera}}
                                                @endif
                                            </td>
										

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{$productos->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
