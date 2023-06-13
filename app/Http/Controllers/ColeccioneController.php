<?php

namespace App\Http\Controllers;

use App\Models\Coleccione;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
/**
 * Class ColeccioneController
 * @package App\Http\Controllers
 */
class ColeccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $colecciones = Coleccione::paginate();

        return view('coleccione.index', compact('colecciones'))
            ->with('i', (request()->input('page', 1) - 1) * $colecciones->perPage());
    }

    public function form()
    {
        return view('coleccione.formularioAnadirColeccion');
    }


    public function listaColecciones()
    {
        $colecciones = Coleccione::all();

        return view('colecciones', compact('colecciones'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coleccione = new Coleccione();
        return view('coleccione.create', compact('coleccione'));
    }

    public function crear()
    {
        $coleccione = new Coleccione();
        return view('coleccione.crear', compact('coleccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coleccione::$rules);

        $datos=$request->all();

        if($request->hasFile('imagen_coleccion')){
        $file=request()->file('imagen_coleccion');
        $obj= Cloudinary::upload($file->getRealPath(),['folder'=>'productos']);
        $url=$obj->getSecurePath();

        $datos['imagen_coleccion']=$url;
        }else{
            $datos['imagen_coleccion']="https://res.cloudinary.com/daizvavk0/image/upload/v1686645847/productos/imgdefault_tn8ezg.jpg";
       
        }

        $coleccione = Coleccione::create($datos);

        if(isset($_REQUEST['crearColeccion'])){
            return redirect()->route('home')->with('success', 'Colección creada correctamente.');;
        }else{
            return redirect()->route('colecciones.index')
            ->with('success', 'Coleccione created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coleccione = Coleccione::find($id);

        return view('coleccione.show', compact('coleccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coleccione = Coleccione::find($id);

        return view('coleccione.edit', compact('coleccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coleccione $coleccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coleccione $coleccione)
    {
        request()->validate(Coleccione::$rules);
        $datos=$request->all();

        if($request->hasFile('imagen_coleccion')){
            $file=request()->file('imagen_coleccion');
            $obj= Cloudinary::upload($file->getRealPath(),['folder'=>'productos']);
            $url=$obj->getSecurePath();
    
            $datos['imagen_coleccion']=$url;

            if($_REQUEST['imagen_anterior']!="https://res.cloudinary.com/daizvavk0/image/upload/v1686645847/productos/imgdefault_tn8ezg.jpg"){
                
                $urlSplit=explode("/",$_REQUEST['imagen_anterior']);
                $ultimoValor=array_pop($urlSplit);
                $publicId=explode(".",$ultimoValor);
                
                Cloudinary::destroy("productos/".$publicId[0]);
            }
        }else{
            $datos['imagen_coleccion']=$_REQUEST['imagen_anterior'];
        }


        Coleccione::where('nombre_coleccion', $_REQUEST['nombre_anterior'])
                        ->update([
                            'nombre_coleccion' => $datos['nombre_coleccion'],
                            'imagen_coleccion' => $datos['imagen_coleccion']
                        ]);

        return redirect()->route('colecciones.index')
            ->with('success', 'Coleccione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $coleccion = Coleccione::find($id);

        if($coleccion->imagen_coleccion!="https://res.cloudinary.com/daizvavk0/image/upload/v1686645847/productos/imgdefault_tn8ezg.jpg"){
            $urlSplit=explode("/",$coleccion->imagen_coleccion);
            $ultimoValor=array_pop($urlSplit);
            $publicId=explode(".",$ultimoValor);
            
            Cloudinary::destroy("productos/".$publicId[0]);
        }

       
        $coleccion->delete();

        if(isset($_REQUEST['borrarColeccion'])){
            return redirect()->route('home')
            ->with('success', 'Colección eliminada correctamente');
        }else{
            return redirect()->route('colecciones.index')
            ->with('success', 'Coleccione deleted successfully');
        }
       
    }
}
