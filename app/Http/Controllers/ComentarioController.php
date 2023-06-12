<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ComentarioController
 * @package App\Http\Controllers
 */
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::paginate();

        return view('comentario.index', compact('comentarios'))
            ->with('i', (request()->input('page', 1) - 1) * $comentarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comentario = new Comentario();
        return view('comentario.create', compact('comentario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Comentario::$rules);

        
        
        if(isset($_REQUEST['comentarioUsuario'])){
            
            if(DB::table('comentarios')->where('id_usuario', $request->id_usuario)->where('id_producto', $request->id_producto)->exists()){
                return redirect()->back()->with('error', 'Solo se puede comentar una vez por usuario.');
            }else{
                $comentario = Comentario::create($request->all());
                return redirect()->back()->with('success', 'Comentario añadido correctamente.');
            }
            
        }else{
            return redirect()->route('comentarios.index')
            ->with('success', 'Comentario created successfully.');
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
        $comentario = Comentario::find($id);

        return view('comentario.show', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);

        return view('comentario.edit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comentario $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        request()->validate(Comentario::$rules);

        $comentario->update($request->all());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        if(isset($_REQUEST['borrarComentario'])){
            $comentario = Comentario::find($id)->delete();
            return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
        }else{
            return redirect()->route('comentarios.index')
            ->with('success', 'Comentario deleted successfully');
        }
    }

}
