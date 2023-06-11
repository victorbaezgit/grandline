<?php

namespace App\Http\Controllers;

use App\Models\Unionpedido;
use Illuminate\Http\Request;

/**
 * Class UnionpedidoController
 * @package App\Http\Controllers
 */
class UnionpedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unionpedidos = Unionpedido::paginate();

        return view('unionpedido.index', compact('unionpedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $unionpedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unionpedido = new Unionpedido();
        return view('unionpedido.create', compact('unionpedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Unionpedido::$rules);

        $unionpedido = Unionpedido::create($request->all());

        return redirect()->route('unionpedidos.index')
            ->with('success', 'Unionpedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unionpedido = Unionpedido::find($id);

        return view('unionpedido.show', compact('unionpedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unionpedido = Unionpedido::find($id);

        return view('unionpedido.edit', compact('unionpedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unionpedido $unionpedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unionpedido $unionpedido)
    {
        request()->validate(Unionpedido::$rules);

        $unionpedido->update($request->all());

        return redirect()->route('unionpedidos.index')
            ->with('success', 'Unionpedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unionpedido = Unionpedido::find($id)->delete();

        return redirect()->route('unionpedidos.index')
            ->with('success', 'Unionpedido deleted successfully');
    }
}
