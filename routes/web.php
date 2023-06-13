<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ColeccioneController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\UnionpedidoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

//HOME
Route::get('/', [App\Http\Controllers\ColeccioneController::class, 'listaColecciones'])->name('home');

//ADMIN

Route::get('/colecciones/create', [ColeccioneController::class,'crear'])->name('colecciones.crear');
Route::get('/productos/create/{id}', [ProductoController::class,'crear'])->name('productos.crear');
Route::get('/tallas/create/{id}', [TallaController::class,'crear'])->name('tallas.crear');

//COLECCIONES-PRODUCTOS
Route::get('/colecciones/{coleccion}', [ProductoController::class,'listaProductos'])->name('productos.listaProductos');
Route::get('/productos/{producto}', [ProductoController::class,'productoIndividual'])->name('productos.productoIndividual');

//CARRITO
Route::get('/carrito', [CarritoController::class,'mostrarCarrito'])->name('carritos.mostrarCarrito');
Route::get('/carrito/pedido-formulario', [CarritoController::class,'confirmarPedido'])->name('carritos.confirmarPedido');
Route::post('/carrito/pedido-finalizar', [PedidoController::class,'hacerPedido'])->name('carritos.hacerPedido');

//PEDIDOS
Route::get('/pedidos', [PedidoController::class,'mostrarPedidos'])->name('pedidos.mostrarPedidos');
Route::get('/pedidos/productos/{pedido}', [UnionpedidoController::class,'mostrarProductosPedido'])->name('unionPedidos.mostrarProductosPedido');


//PERFIL
Route::get('/perfil', [UserController::class,'mostrarPerfil'])->name('users.mostrarPerfil');
Route::get('/perfil/cambiar-contrasena', [UserController::class,'cambiarContrasena'])->name('users.cambiarContrasena');
Route::put('/perfil/actualizar-password', [UserController::class,'actualizarPassword'])->name('users.actualizarPassword');
Route::get('/perfil/detalles-personales', [UserController::class,'detallesPersonales'])->name('users.detallesPersonales');
Route::patch('/perfil/actualizar-perfil/{user}', [UserController::class,'actualizarPerfil'])->name('users.actualizarPerfil');

//FOOTER INFO
Route::view('/politica-envios', 'footerInfo.politicaEnvios')->name('footerInfo.politicaEnvios');
Route::view('/contacto', 'footerInfo.contacto')->name('footerInfo.contacto');
Route::view('/condiciones-venta', 'footerInfo.condicionesVenta')->name('footerInfo.condicionesVenta');
Route::view('/politica-privacidad', 'footerInfo.politicaPrivacidad')->name('footerInfo.politicaPrivacidad');
Route::view('/politica-cookies', 'footerInfo.politicaCookies')->name('footerInfo.politicaCookies');
Route::view('/aviso-legal', 'footerInfo.avisoLegal')->name('footerInfo.avisoLegal');


//CRUD COLECCIONES
Route::get('panel/colecciones', [ColeccioneController::class,'index'])->name('colecciones.index');
Route::get('panel/colecciones/create', [ColeccioneController::class,'create'])->name('colecciones.create');
Route::get('panel/colecciones/{coleccion}', [ColeccioneController::class,'show'])->name('colecciones.show');
Route::get('panel/colecciones/{coleccion}/edit', [ColeccioneController::class,'edit'])->name('colecciones.edit');
Route::post('panel/colecciones', [ColeccioneController::class,'store'])->name('colecciones.store');
Route::patch('panel/colecciones/{coleccion}', [ColeccioneController::class,'update'])->name('colecciones.update');
Route::delete('panel/colecciones/{coleccion}/destroy', [ColeccioneController::class,'destroy'])->name('colecciones.destroy');
//CRUD PRODUCTOS
Route::get('panel/productos', [ProductoController::class,'index'])->name('productos.index');
Route::get('panel/productos/create', [ProductoController::class,'create'])->name('productos.create');
Route::get('panel/productos/{producto}', [ProductoController::class,'show'])->name('productos.show');
Route::get('panel/productos/{producto}/edit', [ProductoController::class,'edit'])->name('productos.edit');
Route::post('panel/productos', [ProductoController::class,'store'])->name('productos.store');
Route::patch('panel/productos/{producto}', [ProductoController::class,'update'])->name('productos.update');
Route::delete('panel/productos/{producto}/destroy', [ProductoController::class,'destroy'])->name('productos.destroy');
//CRUD COMENTARIOS
Route::get('panel/comentarios', [ComentarioController::class,'index'])->name('comentarios.index');
Route::get('panel/comentarios/create', [ComentarioController::class,'create'])->name('comentarios.create');
Route::get('panel/comentarios/{comentario}', [ComentarioController::class,'show'])->name('comentarios.show');
Route::get('panel/comentarios/{comentario}/edit', [ComentarioController::class,'edit'])->name('comentarios.edit');
Route::post('panel/comentarios', [ComentarioController::class,'store'])->name('comentarios.store');
Route::patch('panel/comentarios/{comentario}', [ComentarioController::class,'update'])->name('comentarios.update');
Route::delete('panel/comentarios/{comentario}/destroy', [ComentarioController::class,'destroy'])->name('comentarios.destroy');
//CRUD PEDIDOS
Route::get('panel/pedidos', [PedidoController::class,'index'])->name('pedidos.index');
Route::get('panel/pedidos/create', [PedidoController::class,'create'])->name('pedidos.create');
Route::get('panel/pedidos/{pedido}', [PedidoController::class,'show'])->name('pedidos.show');
Route::get('panel/pedidos/{pedido}/edit', [PedidoController::class,'edit'])->name('pedidos.edit');
Route::post('panel/pedidos', [PedidoController::class,'store'])->name('pedidos.store');
Route::patch('panel/pedidos/{pedido}', [PedidoController::class,'update'])->name('pedidos.update');
Route::delete('panel/pedidos/{pedido}/destroy', [PedidoController::class,'destroy'])->name('pedidos.destroy');
//CRUD UNIONPEDIDOS
Route::get('panel/unionpedidos', [UnionpedidoController::class,'index'])->name('unionpedidos.index');
Route::get('panel/unionpedidos/create', [UnionpedidoController::class,'create'])->name('unionpedidos.create');
Route::get('panel/unionpedidos/{unionpedido}', [UnionpedidoController::class,'show'])->name('unionpedidos.show');
Route::get('panel/unionpedidos/{unionpedido}/edit', [UnionpedidoController::class,'edit'])->name('unionpedidos.edit');
Route::post('panel/unionpedidos', [UnionpedidoController::class,'store'])->name('unionpedidos.store');
Route::patch('panel/unionpedidos/{unionpedido}', [UnionpedidoController::class,'update'])->name('unionpedidos.update');
Route::delete('panel/unionpedidos/{unionpedido}/destroy', [UnionpedidoController::class,'destroy'])->name('unionpedidos.destroy');
//CRUD CARRITOS
Route::get('panel/carritos', [CarritoController::class,'index'])->name('carritos.index');
Route::get('panel/carritos/create', [CarritoController::class,'create'])->name('carritos.create');
Route::get('panel/carritos/{carrito}', [CarritoController::class,'show'])->name('carritos.show');
Route::get('panel/carritos/{carrito}/edit', [CarritoController::class,'edit'])->name('carritos.edit');
Route::post('panel/carritos', [CarritoController::class,'store'])->name('carritos.store');
Route::patch('panel/carritos/{carrito}', [CarritoController::class,'update'])->name('carritos.update');
Route::delete('panel/carritos/{carrito}/destroy', [CarritoController::class,'destroy'])->name('carritos.destroy');
//CRUD TALLAS
Route::get('panel/tallas', [TallaController::class,'index'])->name('tallas.index');
Route::get('panel/tallas/create', [TallaController::class,'create'])->name('tallas.create');
Route::get('panel/tallas/{talla}', [TallaController::class,'show'])->name('tallas.show');
Route::get('panel/tallas/{talla}/edit', [TallaController::class,'edit'])->name('tallas.edit');
Route::post('panel/tallas', [TallaController::class,'store'])->name('tallas.store');
Route::patch('panel/tallas/{talla}', [TallaController::class,'update'])->name('tallas.update');
Route::delete('panel/tallas/{talla}/destroy', [TallaController::class,'destroy'])->name('tallas.destroy');

//CRUD USERS
Route::get('panel/usuarios', [UserController::class,'index'])->name('users.index');
Route::get('panel/usuarios/create', [UserController::class,'create'])->name('users.create');
Route::get('panel/usuarios/{usuario}', [UserController::class,'show'])->name('users.show');
Route::get('panel/usuarios/{usuario}/edit', [UserController::class,'edit'])->name('users.edit');
Route::post('panel/usuarios', [UserController::class,'store'])->name('users.store');
Route::patch('panel/usuarios/{usuario}', [UserController::class,'update'])->name('users.update');
Route::delete('panel/usuarios/{usuario}/destroy', [UserController::class,'destroy'])->name('users.destroy');
