<?php

namespace App\Http\Controllers;

use App\Models\Coleccione;
use Illuminate\Http\Request;

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
            $file=$request['imagen_coleccion'];
            $destinationPath="img/";
            $filename=time() . "-" . $file->getClientOriginalName();
            $uploadSuccess= $request['imagen_coleccion']->move($destinationPath, $filename);
            $datos['imagen_coleccion']=$destinationPath . $filename;
        }else{
            $datos['imagen_coleccion']="img/j-sin-foto.png";
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

        $coleccione->update($request->all());

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

        $coleccione = Coleccione::find($id);

        if($coleccione['imagen_coleccion']!="img/j-sin-foto.png"){
            unlink($coleccione['imagen_coleccion']);
        }

        $coleccione->delete();

        if(isset($_REQUEST['borrarColeccion'])){
            return redirect()->route('home')
            ->with('success', 'Colección eliminada correctamente');
        }else{
            return redirect()->route('colecciones.index')
            ->with('success', 'Coleccione deleted successfully');
        }

       
    }
}
