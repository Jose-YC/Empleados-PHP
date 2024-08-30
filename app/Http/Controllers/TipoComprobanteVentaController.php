<?php

namespace App\Http\Controllers;

use App\Models\TipoComprobanteVenta;
use Illuminate\Http\Request;

/**
 * Class TipoComprobanteVentaController
 * @package App\Http\Controllers
 */
class TipoComprobanteVentaController extends Controller
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
        $tipoComprobanteVentas = TipoComprobanteVenta::all();

        return view('tipo-comprobante-venta.index', compact('tipoComprobanteVentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoComprobanteVenta = new TipoComprobanteVenta();
        return view('tipo-comprobante-venta.create', compact('tipoComprobanteVenta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoComprobanteVenta::$rules);

        $tipoComprobanteVenta = TipoComprobanteVenta::create($request->all());

        return redirect()->route('tipo-comprobante-ventas.index')
            ->with('success', 'TipoComprobanteVenta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoComprobanteVenta $tipoComprobanteVenta)
    {
        return view('tipo-comprobante-venta.show', compact('tipoComprobanteVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoComprobanteVenta $tipoComprobanteVenta)
    {
        return view('tipo-comprobante-venta.edit', compact('tipoComprobanteVenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoComprobanteVenta $tipoComprobanteVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoComprobanteVenta $tipoComprobanteVenta)
    {
        request()->validate(TipoComprobanteVenta::$rules);

        $tipoComprobanteVenta->update($request->all());

        return redirect()->route('tipo-comprobante-ventas.index')
            ->with('success', 'TipoComprobanteVenta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(TipoComprobanteVenta $tipoComprobanteVenta)
    {
        $tipoComprobanteVenta->delete();

        return redirect()->route('tipo-comprobante-ventas.index')
            ->with('success', 'TipoComprobanteVenta deleted successfully');
    }
}
