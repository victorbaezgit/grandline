@extends('layouts.app')

@section('content')
    <div class="contenido col-10">
        <h1 class="mb-4 mt-4"><strong>Preguntas Frecuentes</strong></h1>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    ¿Cómo puedo crearme una cuenta?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <p>1. Haga click en el desplegable que se encuentra en la parte superior izquierda de la página.</p>
                   <p>2. Pulse en Registrarse.</p>
                   <p>3. Una vez aparezca el formulario, debe ingresar los datos que se le indica.</p>
                   <p>4. Pulse en crear cuenta.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ¿Qué hago si olvidé la contraseña?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <p>1. Haga click donde dice "Login" en la parte superior derecha de la página.</p>
                   <p>2. Haz click donde dice: "¿Olvidaste tu contraseña?"</p>
                   <p>3. Introduzca el email de su cuenta y pulse en enviar enlace.</p>
                   <p>4. Le debería haber llegado un mensaje a su correspondiente correo, el cual debe abrir y pulsar en el boton.</p>
                   <p>5. Introduzca su nueva contraseña y vuelve a repetirla nuevamente.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ¿Cómo puedo buscar productos en la tienda web?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>1. Diríjase a la página principal, para ello pulse en el logo que se encuentra en la parte superior izquierda.</p>
                   <p>2. Elija la colección que más le interesa.</p>
                   <p>3. Una vez elegida la colección, podrá ver los productos de la misma.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ¿Cuál es el proceso para completar una compra una vez que tengo los productos en el carrito?
                </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>1. Primero compruebe que los productos y unidades que aparecen en el carrito sean los que va a comprar.</p>
                   <p>2. Pulse en finalizar pedido.</p>
                   <p>3. Aparecerá un formulario con la dirección de entrega, la cual debe rellenar.</p>
                   <p>3. Pulse en finalizar. Para ver sus pedidos puede irse a su perfil clicando en su nombre en la parte superior derecha. Una vez estés en tu perfil pulsa en "Ver pedidos" y podrá confirmar que sus productos han sido solicitados.</p>
                  </div>
                </div>
              </div>
          </div>

          
      </div>



      

    </div>

    

@endsection
