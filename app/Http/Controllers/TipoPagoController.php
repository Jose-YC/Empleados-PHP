<?php

namespace App\Http\Controllers;

use App\Models\TipoPago;
use Illuminate\Http\Request;

/**
 * Class TipoPagoController
 * @package App\Http\Controllers
 */
class TipoPagoController extends Controller
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
        $tipoPagos = TipoPago::all();

        return view('tipo-pago.index', compact('tipoPagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoPago = new TipoPago();
        return view('tipo-pago.create', compact('tipoPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoPago::$rules);

        $tipoPago = TipoPago::create($request->all());

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'TipoPago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPago $tipoPago)
    {
        return view('tipo-pago.show', compact('tipoPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPago $tipoPago)
    {
        return view('tipo-pago.edit', compact('tipoPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoPago $tipoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPago $tipoPago)
    {
        request()->validate(TipoPago::$rules);

        $tipoPago->update($request->all());

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'TipoPago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(TipoPago $tipoPago)
    {
        $tipoPago->delete();

        return redirect()->route('tipo-pagos.index')
            ->with('success', 'TipoPago deleted successfully');
    }
}
