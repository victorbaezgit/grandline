<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

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

        $talla = Talla::create($request->all());

        return redirect()->route('tallas.index')
            ->with('success', 'Talla created successfully.');
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
