<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Coleccione;
use App\Models\Talla;
use App\Models\Producto;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $colecciones= Coleccione::all();
        return view('producto.create', compact('producto','colecciones'));
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
            $file = request()->file('imagen_delantera');
            $obj = Cloudinary::upload($file->getRealPath(), ['folder' => 'productos']);
            $url = $obj->getSecurePath();
    
            $datos['imagen_delantera'] = $url;
        } else {
            $datos['imagen_delantera'] = "https://res.cloudinary.com/daizvavk0/image/upload/v1686641340/productos/imgdefault_lm7auu.jpg";
        }


        if ($request->hasFile('imagen_trasera')) {
            $file = request()->file('imagen_trasera');
            $obj = Cloudinary::upload($file->getRealPath(), ['folder' => 'productos']);
            $url = $obj->getSecurePath();
    
            $datos['imagen_trasera'] = $url;
        } else {
            $datos['imagen_trasera'] = "https://res.cloudinary.com/daizvavk0/image/upload/v1686641340/productos/imgdefault_lm7auu.jpg";
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
        $colecciones= Coleccione::all();
        return view('producto.edit', compact('producto','colecciones'));
    }

    public function editar($id)
    {
        $producto = Producto::find($id);
        return view('producto.editar', compact('producto'));
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

        $datos=$request->all();

        if($request->hasFile('imagen_delantera')){
            $file=request()->file('imagen_delantera');
            $obj= Cloudinary::upload($file->getRealPath(),['folder'=>'productos']);
            $url=$obj->getSecurePath();
    
            $datos['imagen_delantera']=$url;

            if($_REQUEST['imagen_delantera_anterior']!="https://res.cloudinary.com/daizvavk0/image/upload/v1686645847/productos/imgdefault_tn8ezg.jpg"){
                
                $urlSplit=explode("/",$_REQUEST['imagen_delantera_anterior']);
                $ultimoValor=array_pop($urlSplit);
                $publicId=explode(".",$ultimoValor);
                
                Cloudinary::destroy("productos/".$publicId[0]);
            }
        }else{
            $datos['imagen_delantera']=$_REQUEST['imagen_delantera_anterior'];
        }

        if($request->hasFile('imagen_trasera')){
            $file=request()->file('imagen_trasera');
            $obj= Cloudinary::upload($file->getRealPath(),['folder'=>'productos']);
            $url=$obj->getSecurePath();
    
            $datos['imagen_trasera']=$url;

            if($_REQUEST['imagen_trasera_anterior']!="https://res.cloudinary.com/daizvavk0/image/upload/v1686645847/productos/imgdefault_tn8ezg.jpg"){
                
                $urlSplit=explode("/",$_REQUEST['imagen_trasera_anterior']);
                $ultimoValor=array_pop($urlSplit);
                $publicId=explode(".",$ultimoValor);
                
                Cloudinary::destroy("productos/".$publicId[0]);
            }
        }else{
            $datos['imagen_trasera']=$_REQUEST['imagen_trasera_anterior'];
        }

        $producto->update($datos);


        if(isset($_REQUEST['editarProducto'])){
            return redirect()->route('productos.listaProductos', $producto->id_coleccion)->with('success', 'Producto actualizado correctamente');
        }else{
            return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
        }

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

        if ($productoCopia->imagen_delantera != "https://res.cloudinary.com/daizvavk0/image/upload/v1686641340/productos/imgdefault_lm7auu.jpg") {
            $urlSplit = explode("/", $productoCopia->imagen_delantera);
            $ultimoValor = array_pop($urlSplit);
            $publicId = explode(".", $ultimoValor);

            Cloudinary::destroy("productos/" . $publicId[0]);
        }

        if ($productoCopia->imagen_trasera != "https://res.cloudinary.com/daizvavk0/image/upload/v1686641340/productos/imgdefault_lm7auu.jpg") {
            $urlSplit = explode("/", $productoCopia->imagen_trasera);
            $ultimoValor = array_pop($urlSplit);
            $publicId = explode(".", $ultimoValor);

            Cloudinary::destroy("productos/" . $publicId[0]);
        }


        $producto->delete();

        if (isset($_REQUEST['borrarProducto'])) {
            return redirect()->route('productos.listaProductos', $productoCopia['id_coleccion'])->with('success', 'Producto eliminado correctamente');;
        } else {
            return redirect()->route('productos.index')
                ->with('success', 'Producto deleted successfully');
        }
    }
}
