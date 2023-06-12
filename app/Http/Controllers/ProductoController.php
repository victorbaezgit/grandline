<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Coleccione;
use App\Models\Talla;
use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    public function crear($id)
    {
        $producto = new Producto();
        $coleccion = Coleccione::find($id);
        return view('producto.crear', compact('producto', 'coleccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        request()->validate(Producto::$rules);

        $datos = $request->all();

        if ($request->hasFile('imagen_delantera')) {
            $file = $request['imagen_delantera'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['imagen_delantera']->move($destinationPath, $filename);
            $datos['imagen_delantera'] = $destinationPath . $filename;
        }

        if ($request->hasFile('imagen_trasera')) {
            $file = $request['imagen_trasera'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['imagen_trasera']->move($destinationPath, $filename);
            $datos['imagen_trasera'] = $destinationPath . $filename;
        }

        $producto = Producto::create($datos);

        $productos = Producto::all()->where("id_coleccion", "=", $producto->id_coleccion);
        $coleccion = Coleccione::find($producto->id_coleccion);

        if (isset($_REQUEST['crearProducto'])) {
            return view('producto.mostrarProductos', compact('productos', 'coleccion'))->with('success', 'Producto añadido correctamente.');
        } else {
            return redirect()->route('productos.index')
                ->with('success', 'Producto created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function listaProductos($id)
    {
        $coleccion = Coleccione::find($id);

        $productos = Producto::all()->where("id_coleccion", "=", $id);
        return view('producto.mostrarProductos', compact('productos', 'coleccion'));
    }

    public function productoIndividual($id)
    {
        $producto = Producto::find($id);
        $tallasDisponibles = Talla::all()->where("id_producto", "=", $id);
        $tallasTotal = ['S', 'M', 'L', 'XL'];
        $id_coleccion = $producto->id_coleccion;
        $productosRelacionados = Producto::all()->where("id_coleccion", "=", $id_coleccion)->where("id", "!=", $id);
        $comentarios = Comentario::where("id_producto", "=", $id)->paginate(5);

        return view('producto.productoIndividual', compact('producto', 'tallasDisponibles', 'tallasTotal', 'productosRelacionados', 'comentarios'))->with('i', (request()->input('page', 1) - 1) * $comentarios->perPage());;
    }




    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $productoCopia = Producto::find($id);


        if ($producto['imagen_delantera'] == $producto['imagen_delantera']) {
            unlink($producto['imagen_delantera']);
        } else {
            if ($producto['imagen_delantera'] != "img/j-sin-foto.png") {
                unlink($producto['imagen_delantera']);
            }

            if ($producto['imagen_trasera'] != "img/j-sin-foto.png") {
                unlink($producto['imagen_trasera']);
            }
        }

        $producto->delete();

        $coleccion = Coleccione::find($productoCopia['id_coleccion']);
        $productos = Producto::all()->where("id_coleccion", "=", $productoCopia['id_coleccion']);



        if (isset($_REQUEST['borrarProducto'])) {
            return redirect()->route('productos.listaProductos', $productoCopia['id_coleccion']);
        } else {
            return redirect()->route('productos.index')
                ->with('success', 'Producto deleted successfully');
        }
    }
}
