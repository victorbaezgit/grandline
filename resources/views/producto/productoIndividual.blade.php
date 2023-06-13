@extends('layouts.app')

@section('template_title')
    {{-- {{ $producto->name ?? "{{ __('Show') Producto" }} --}}
@endsection



@section('content')

<div class="productoIndividual">
    <div class="bg-light">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container px-4 px-lg-5 mt-5">
            @Auth
            @if(Auth::user()->hasRole('admin'))
            <a href="{{route('tallas.crear', $producto->id)}}" id="buttomLogin" style="width: 15%; min-width: 194px;font-size: 17px" class="bg-warning btn mb-3">+ Añadir stock</a>
            @endif
            @endAuth
           
            <div class="contenedorProducto">
                
                    <div class="mb-3" data-bs-interval="false">

                        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="{{$producto->imagen_delantera}}" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="" class="d-block w-100" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                
                    </div>

            

                <div class="infoProcuto col-xl-6">


                    <form method="POST" action="@auth {{route('carritos.store')}} @else {{route('login')}} @endauth"  role="form" enctype="multipart/form-data">
                        @csrf

                        @guest
                        @method('GET')
                        @endguest

                                {{ Form::hidden('añadirCarrito', true) }}
                                {{ Form::hidden('id_producto', 1) }}
                                {{ Form::hidden('id_usuario', Auth::id()) }}
                                {{ Form::hidden('unidades', 1) }}


                                <div class="d-flex justify-content-between">
                                    <h1>{{$producto->nombre_producto}}</h1>
                                    <a class="btn btn-outline-dark flex-shrink-0 d-flex justify-content-center align-items-center" type="button" href="#comentarios">
                                        <i class="bi bi-star me-1"></i>
                                        Escribir comentario
                                    </a>
                                </div>
                                <h5 class="mb-5">{{$producto->precio}}€</h5>
            
                                <div class="tallas" style="display: flex">
                                    @foreach($tallasTotal as $tallaTotal)
                                        <p type="button" class="{{$tallaTotal}}" name="talla" style="margin-right: 20px;font-size: 18px;padding-left:3px;background-color:transparent;border: none;margin-bottom: 5px"
                                           @foreach($tallasDisponibles as $tallaDisponible)
                                               @if($tallaDisponible->tipo_talla == $tallaTotal)
                                                    id="{{$tallaDisponible->stock}}"
                                                @endif
                                            @endforeach
                                            >{{$tallaTotal}}</p>
                                    @endforeach
                                </div>

                                @auth
                                    @if(Auth::user()->hasRole('admin'))
                                    <!-- Button trigger modal -->
                                    <button style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold p-3" type="button" id="addToCart" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Añadir al carrito
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¡Atención!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="text-align: left">
                                                    <p>No puedes comprar productos siendo admin</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <button type="submit" id="addToCart" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold p-3">Añadir al carrito</button>
                                    @endif
                                @else
                                        <button type="submit" id="addToCart" style="width: 100%; min-width: 194px;font-size: 21px;margin-bottom: 15px" class="btn bg-warning fw-bold p-3">Añadir al carrito</button>

                                @endauth
            
            
                                <hr>
                                <p>{{$producto->descripcion}}</p>
                                <ul>
                                    <li>280 g/m², 80% algodón ring-spun y peinado, 20% poliéster</li>
                                       <li class="fw-bold">Tejido de 3 capas</li>
                                        <li>Sisas, puños y bajo con tapa costura</li>
                                        <li class="fw-bold"><a href="" class="text-dark text-decoration-none">Guía de tallas y Recomendaciones de cuidado</a></li>
                                </ul>
                       
                
                    </form>

              


            </div>
    </div>

    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="mb-4 mb-5">Productos relacionados</h1>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($productosRelacionados as $productoRelacionado)
                <div class="col mb-5">
                    <div class="card h-100">

                        <img class="card-img-top" src="https://brunosmoda.com/wp-content/uploads/2021/01/CAMISETA-NEGRA-LISA-HOMBRE-10043675_000-5.jpg" alt="..." />

                        <div class="card-body p-4">
                            <div class="text-center">

                                <h5 class="fw-bolder">{{ $productoRelacionado->nombre_producto }}</h5>

                                {{$productoRelacionado->precio}} €
                                
                            </div>
                        </div>
                        
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url("/productos/".$productoRelacionado->id)}}">Ver producto</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($productosRelacionados->count() == 0)
                <h5 class="fw-bolder mb-4">Parece que aún no hay juegos similares...</h5>
                @endif
                
            </div>
        </div>
        <p id="comentarios"></p>
    </section>


    <section>
    <div class="container px-4 px-lg-5 mt-1">
        <h1 class="text-dark mb-4">Comentarios</h1>
      <div class="card bg-light">
        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                @elseif($message = Session::get('comentariosuccess'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                @endif
          <div class="card-body text-dark p-5">


              @includeif('partials.errors')
              <form method="POST" action="@auth {{route('comentarios.store')}} @else {{route('login')}} @endauth"  role="form" class="mb-4" enctype="multipart/form-data">
                @csrf
                @guest
                @method('GET')
                @endguest
            
                {{ Form::hidden('comentarioUsuario', true) }}
                {{ Form::hidden('id_producto', $producto->id) }}
                {{ Form::hidden('id_usuario', Auth::id()) }}
                {{ Form::textarea('contenido', "", ['class' => 'form-control mb-4' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Comenta sobre el producto']) }}
                {!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}  
                <button type="submit" class="btn bg-warning fw-bold p-3">Escribir comentario</button>  
            </form>
             
            <hr>
              <!-- Comment with nested comments-->
              @foreach ($comentarios as $comentario)
                
                <div class="d-flex mb-4">
                    <!-- Parent comment-->
                    <div class="flex-shrink-0 rounded-circle bg-warning d-flex justify-content-center align-items-center" style="width:50px;height:50px;object-fit:cover;">{{strtoupper(substr($comentario->user->name,0,1))}}</div>
                    <div class="ms-3">
                    
                        <div class="fw-bold d-flex"><span class="fw-bolder">{{$comentario->user->name}}</span> &middot; {{substr($comentario->created_at,0,10)}}

                            @if (Auth::id()==$comentario->user->id)
                            <form action="{{ route('comentarios.destroy',$comentario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="borrarComentario" value="borrarComentario">
                                <button type="submit" style="background-color:white;border:none;color: red;font-weight: 400;text-decoration: none;font-size: 10px"><i class="fa fa-fw fa-trash m-1"></i> {{ __('Eliminar') }}</button>
                              </form>
                            @endif

                        </div>
                        @if (strlen($comentario->contenido)>100)
                            {{substr($comentario->contenido,0,100)}}...
                        @else
                            "{{substr($comentario->contenido,0,100)}}"
                        @endif

                        
                        
                        
                    </div>
                </div>
              @endforeach
              @if ($comentarios->count() == 0)
                <h5 class="fw-bolder mb-4">Parece que aún no hay comentarios...</h5>
              @endif

              {{$comentarios->links("pagination::bootstrap-4")}}
          </div>
          
      </div>
    </div>
  </section>
</div>
</div>
</section>



            @endsection

            @section('scripts')

                <script>



                    var botonAddToCArt = document.querySelector("#addToCart")
                    var tallaS = document.querySelector(".S")
                    var tallaM = document.querySelector(".M")
                    var tallaL = document.querySelector(".L")
                    var tallaXL = document.querySelector(".XL")

                    var buttonS = document.createElement('input');
                    var buttonM = document.createElement('input');
                    var buttonL = document.createElement('input');
                    var buttonXL = document.createElement('input');

                    var tallas = document.querySelector(".tallas")

                    tallaS.classList.add("seleccionado")
                    if (!tallaS.id || tallaS.id==='0'){
                        botonAddToCArt.classList.add("agotado")
                        botonAddToCArt.innerHTML = "No disponible"
                    }
                    else{
                        botonAddToCArt.innerHTML = "Añadir al carrito"
                        botonAddToCArt.classList.remove("agotado")


                        buttonS.type = 'hidden';
                        buttonS.name = 'talla';
                        buttonS.value = 'S';
                        buttonS.className = 'btnS';



                        tallas.appendChild(buttonS);


                    }
                    tallaS.addEventListener("click", () => {
                        tallaS.classList.add("seleccionado")
                        tallaM.classList.remove("seleccionado")
                        tallaL.classList.remove("seleccionado")
                        tallaXL.classList.remove("seleccionado")
                        if (!tallaS.id ||tallaS.id==='0'){
                            botonAddToCArt.classList.add("agotado")
                            botonAddToCArt.innerHTML = "No disponible"

                        }
                        else{
                            botonAddToCArt.innerHTML = "Añadir al carrito"
                            botonAddToCArt.classList.remove("agotado")


                            if (document.querySelector('.btnM')){
                                buttonM.parentNode.removeChild(buttonM);
                            }

                            if(document.querySelector('.btnL')){
                                buttonL.parentNode.removeChild(buttonL);
                            }

                            if (document.querySelector('.btnXL')){
                                buttonXL.parentNode.removeChild(buttonXL);
                            }


                            buttonS.type = 'hidden';
                            buttonS.name = 'talla';
                            buttonS.value = 'S';
                            buttonS.className = 'btnS';



                            tallas.appendChild(buttonS);

                        }
                    })

                    tallaM.addEventListener("click", () => {
                        tallaM.classList.add("seleccionado")
                        tallaS.classList.remove("seleccionado")
                        tallaL.classList.remove("seleccionado")
                        tallaXL.classList.remove("seleccionado")
                        if (!tallaM.id||tallaM.id==='0'){
                            botonAddToCArt.classList.add("agotado")
                            botonAddToCArt.innerHTML = "No disponible"

                        }
                        else{
                            botonAddToCArt.innerHTML = "Añadir al carrito"
                            botonAddToCArt.classList.remove("agotado")




                            if(document.querySelector('.btnS')){
                                buttonS.parentNode.removeChild(buttonS);
                            }


                            if(document.querySelector('.btnL')){
                                buttonL.parentNode.removeChild(buttonL);
                            }

                            if (document.querySelector('.btnXL')){
                                buttonXL.parentNode.removeChild(buttonXL);
                            }

                            buttonM.type = 'hidden';
                            buttonM.name = 'talla';
                            buttonM.value = 'M';
                            buttonM.className = 'btnM';



                            tallas.appendChild(buttonM);
                        }
                    })

                    tallaL.addEventListener("click", () => {
                        tallaL.classList.add("seleccionado")
                        tallaS.classList.remove("seleccionado")
                        tallaM.classList.remove("seleccionado")
                        tallaXL.classList.remove("seleccionado")
                        if (!tallaL.id||tallaL.id==='0'){
                            botonAddToCArt.classList.add("agotado")
                            botonAddToCArt.innerHTML = "No disponible"

                        }
                        else{
                            botonAddToCArt.innerHTML = "Añadir al carrito"
                            botonAddToCArt.classList.remove("agotado")


                            if (document.querySelector('.btnM')){
                                buttonM.parentNode.removeChild(buttonM);
                            }

                            if(document.querySelector('.btnS')){
                                buttonS.parentNode.removeChild(buttonS);
                            }

                            if (document.querySelector('.btnXL')){
                                buttonXL.parentNode.removeChild(buttonXL);
                            }

                            buttonL.type = 'hidden';
                            buttonL.name = 'talla';
                            buttonL.value = 'L';
                            buttonL.className = 'btnL';



                            tallas.appendChild(buttonL);
                        }
                    })

                    tallaXL.addEventListener("click", () => {
                        tallaXL.classList.add("seleccionado")
                        tallaS.classList.remove("seleccionado")
                        tallaL.classList.remove("seleccionado")
                        tallaM.classList.remove("seleccionado")
                        if (!tallaXL.id||tallaXL.id==='0'){
                            botonAddToCArt.classList.add("agotado")
                            botonAddToCArt.innerHTML = "No disponible"

                        }
                        else{
                            botonAddToCArt.innerHTML = "Añadir al carrito"
                            botonAddToCArt.classList.remove("agotado")


                            if (document.querySelector('.btnM')){
                                buttonM.parentNode.removeChild(buttonM);
                            }

                            if(document.querySelector('.btnL')){
                                buttonL.parentNode.removeChild(buttonL);
                            }

                            if (document.querySelector('.btnS')){
                                buttonS.parentNode.removeChild(buttonS);
                            }

                            buttonXL.type = 'hidden';
                            buttonXL.name = 'talla';
                            buttonXL.value = 'XL';
                            buttonXL.className = 'btnXL';



                            tallas.appendChild(buttonXL);
                        }
                    })

                </script>



@endsection
