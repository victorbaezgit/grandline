<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate();

        return view('pedido.index', compact('pedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();
        return view('pedido.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pedido::$rules);

        $pedido = Pedido::create($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido created successfully.');
    }

    public function hacerPedido(Request $request)
    {
       
        $id_usuario = Auth::user()->id;
        $productos = Producto::all();
        $cart = Carrito::where('id_usuario', $id_usuario)->get();
        
         $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'codigoPostal' => ['required', 'string', 'min:4','max:9'],
            'localidad' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric','digits:9'],
        ]);

        // $purchase = Purchase::create([
        //     'user_id'=>$user_id,
        //     'total_price'=>$request['precioTotal'],
        //     'direccion'=>$request['direccion'],
        //     'codigo_postal'=>$request['codigoPostal'],
        //     'pais'=>$request['pais'],
        //     'localidad'=>$request['localidad'],
        //     'telefono'=>$request['telefono'],
        //     'fecha_de_compra'=>Carbon::now()->format('d/m/Y'),
        // ]);

        // foreach ($cart as $car){

        //     PurchaseLines::create([
        //         'purchase_id'=>$purchase->id,
        //         'user_id'=>$user_id,
        //         'clothe_id'=>$clothe->where('id',$car->clothe_id)->first()->id,
        //         'size'=>$car->talla,
        //         'amount'=>$car->unidades,
        //         'unitary_price'=>$clothe->where('id',$car->clothe_id)->first()->price,
        //     ]);

        //     Cart::where('id', $car->id)->delete();
        // }


        // return redirect()->route('home')
        //     ->with('message','Compra realizada correctamente');








        // request()->validate(Pedido::$rules);

        // $pedido = Pedido::create($request->all());

        // return redirect()->route('pedidos.index')
        //     ->with('success', 'Pedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }
}
