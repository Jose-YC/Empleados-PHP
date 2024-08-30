<?php

namespace App\Http\Controllers;

use App\Models\Unidadmedida;
use Illuminate\Http\Request;

/**
 * Class UnidadmedidaController
 * @package App\Http\Controllers
 */
class UnidadmedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $unidadmedidas = Unidadmedida::all();

        return view('unidadmedida.index', compact('unidadmedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadmedida = new Unidadmedida();
        return view('unidadmedida.create', compact('unidadmedida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Unidadmedida::$rules);

        $unidadmedida = Unidadmedida::create($request->all());

        return redirect()->route('unidadmedidas.index')
            ->with('success', 'Unidadmedida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unidadmedida $unidadmedida)
    {
        return view('unidadmedida.show', compact('unidadmedida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    //
    public function edit(Unidadmedida $unidadmedida)
    {
        return view('unidadmedida.edit', compact('unidadmedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unidadmedida $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidadmedida $unidadmedida)
    {
        request()->validate(Unidadmedida::$rules);

        $unidadmedida->update($request->all());

        return redirect()->route('unidadmedidas.index')
            ->with('success', 'Unidadmedida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Unidadmedida $unidadmedida)
    {
        $unidadmedida->delete();

        return redirect()->route('unidadmedidas.index')
            ->with('success', 'Unidadmedida deleted successfully');
    }
}
