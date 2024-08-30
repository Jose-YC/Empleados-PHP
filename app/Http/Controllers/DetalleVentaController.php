<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

/**
 * Class DetalleVentaController
 * @package App\Http\Controllers
 */
class DetalleVentaController extends Controller
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
        $detalleVentas = DetalleVenta::all();

        return view('detalle-venta.index', compact('detalleVentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleVenta = new DetalleVenta();
        return view('detalle-venta.create', compact('detalleVenta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleVenta::$rules);

        $detalleVenta = DetalleVenta::create($request->all());

        return redirect()->route('detalle-ventas.index')
            ->with('success', 'DetalleVenta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleVenta $detalleVenta)
    {
        return view('detalle-venta.show', compact('detalleVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleVenta $detalleVenta)
    {


        return view('detalle-venta.edit', compact('detalleVenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleVenta $detalleVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        request()->validate(DetalleVenta::$rules);

        $detalleVenta->update($request->all());

        return redirect()->route('detalle-ventas.index')
            ->with('success', 'DetalleVenta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();

        return redirect()->route('detalle-ventas.index')
            ->with('success', 'DetalleVenta deleted successfully');
    }
}
