<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use App\Models\Comentario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class TallaController
 * @package App\Http\Controllers
 */
class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tallas = Talla::paginate();

        return view('talla.index', compact('tallas'))
            ->with('i', (request()->input('page', 1) - 1) * $tallas->perPage());
    }

    public function crear($id)
    {
        $talla = new Talla();
        $producto = Producto::find($id);
        $tallasTotal=['S','M','L','XL'];
        return view('talla.crear', compact('talla', 'producto', 'tallasTotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talla = new Talla();
        return view('talla.create', compact('talla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Talla::$rules);

        $datos = $request->all();


        if (DB::table('tallas')->where('id_producto', $datos['id_producto'])->where('tipo_talla', $datos['tipo_talla'])->exists()) {
                Talla::where('id_producto', $datos['id_producto'])->where('tipo_talla', $datos['tipo_talla'])
                    ->update([
                        'stock' => DB::raw("stock+".$datos['stock'])
                    ]);
        } else {
            $talla = Talla::create($datos);
        }

        if(isset($_REQUEST['AnadirStock'])){
            return redirect()->route('productos.productoIndividual', $datos['id_producto'])->with('success', 'Stock añadido correctamente.');
        }else{
            return redirect()->route('tallas.index')
            ->with('success', 'Talla created successfully.');
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
        $talla = Talla::find($id);

        return view('talla.show', compact('talla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talla = Talla::find($id);

        return view('talla.edit', compact('talla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Talla $talla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talla $talla)
    {

        
        request()->validate(Talla::$rules);

        $talla->update($request->all());

        return redirect()->route('tallas.index')
            ->with('success', 'Talla updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $talla = Talla::find($id)->delete();

        return redirect()->route('tallas.index')
            ->with('success', 'Talla deleted successfully');
    }
}
