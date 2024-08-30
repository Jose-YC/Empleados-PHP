<?php

namespace App\Http\Controllers;

use App\Models\EstadosFinanciero;
use Illuminate\Http\Request;

/**
 * Class EstadosFinancieroController
 * @package App\Http\Controllers
 */
class EstadosFinancieroController extends Controller
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
        $estadosFinancieros = EstadosFinanciero::all();

        return view('estados-financiero.index', compact('estadosFinancieros')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estadosFinanciero = new EstadosFinanciero();
        return view('estados-financiero.create', compact('estadosFinanciero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadosFinanciero::$rules);

        $estadosFinanciero = EstadosFinanciero::create($request->all());

        return redirect()->route('estados-financieros.index')
            ->with('success', 'EstadosFinanciero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadosFinanciero $estadosFinanciero)
    {

        return view('estados-financiero.show', compact('estadosFinanciero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadosFinanciero $estadosFinanciero)
    {


        return view('estados-financiero.edit', compact('estadosFinanciero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadosFinanciero $estadosFinanciero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadosFinanciero $estadosFinanciero)
    {
        request()->validate(EstadosFinanciero::$rules);

        $estadosFinanciero->update($request->all());

        return redirect()->route('estados-financieros.index')
            ->with('success', 'EstadosFinanciero updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(EstadosFinanciero $estadosFinanciero)
    {
        $estadosFinanciero->delete();

        return redirect()->route('estados-financieros.index')
            ->with('success', 'EstadosFinanciero deleted successfully');
    }
}
