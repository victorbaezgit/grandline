@extends('layouts.app')

@section('template_title')
    Talla
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Talla') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tallas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Producto</th>
										<th>Tipo Talla</th>
										<th>Stock</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tallas as $talla)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td> {{$talla->producto['nombre_producto']}} id-({{ $talla->id_producto }})</td>
											<td>{{ $talla->tipo_talla }}</td>
											<td>{{ $talla->stock }}</td>

                                            <td>
                                                <form action="{{ route('tallas.destroy',$talla->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tallas.show',$talla->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tallas.edit',$talla->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {{$tallas->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
