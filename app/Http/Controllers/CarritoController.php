<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
/**
 * Class CarritoController
 * @package App\Http\Controllers
 */
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::paginate();

        return view('carrito.index', compact('carritos'))
            ->with('i', (request()->input('page', 1) - 1) * $carritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrito = new Carrito();
        return view('carrito.create', compact('carrito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Carrito::$rules);

        if (isset($_REQUEST['añadirCarrito'])) {

            $maximo = Talla::where("id_producto", "=", $request->id_usuario)->where("tipo_talla", "=", $request->talla)->get();
            $carritoActual = Carrito::where('id_usuario', $request->id_usuario)->where('id_producto', $request->id_producto)->where('talla', $request->talla)->get();


            if (DB::table('carritos')->where('id_usuario', $request->id_usuario)->where('id_producto', $request->id_producto)->where('talla', $request->talla)->exists()) {
                if ($maximo[0]->stock <= $carritoActual[0]->unidades) {
                    return redirect()->route('carritos.mostrarCarrito')->with('error', 'No hay más productos para añadir.'); 
                } else {
                    Carrito::where('id_usuario', $request->id_usuario)->where('id_producto', $request->id_producto)->where('talla', $request->talla)
                        ->update([
                            'unidades' => DB::raw('unidades+1')
                        ]);
                }
            } else {
                $carrito = Carrito::create($request->all());
            }
            return redirect()->route('carritos.mostrarCarrito')->with('success', 'Se ha añadido correctamente al carrito.');
        } else {
            $carrito = Carrito::create($request->all());

            return redirect()->route('carritos.index')
                ->with('success', 'Carrito created successfully.');
        }
    }

    public function mostrarCarrito()
    {
        $carrito = Carrito::where("id_usuario","=",Auth::id())->get();

        return view('carrito.mostrarCarrito', compact('carrito'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrito = Carrito::find($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrito = Carrito::find($id);

        return view('carrito.edit', compact('carrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrito $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        request()->validate(Carrito::$rules);

        $carrito->update($request->all());

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */


    public function destroy($id)
    {
        $carrito = Carrito::find($id)->delete();

        if(isset($_REQUEST['borrarCarrito'])){
            return redirect()->back();
        }else{
            return redirect()->route('carritos.index')
            ->with('success', 'Carrito deleted successfully');
        }
        
    }
}
