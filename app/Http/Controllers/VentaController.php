<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\TipoComprobanteVenta;
use App\Models\TipoPago;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
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
        $ventas = Venta::all();

        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productos = Producto::whereNotNull('propreciounitario')->select('idProducto', 'pronombre', 'propreciounitario', 'prostock', 'idUnidadmedida')->get();
        $comprobante = TipoComprobanteVenta::pluck('tcomcomprobante', 'idTipocomprobante');
        $pago = TipoPago::pluck('tpagotipo', 'idTipopago');
        $modoEdicion = false;
        $venta = new Venta();
        return view('venta.create', compact('venta', 'comprobante', 'pago', 'productos', 'modoEdicion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);
        DB::transaction(function () use ($request) {
            $venta = Venta::create(
                [
                    'venfecha' => date('Y-m-d'),
                    'vendocumentocliente' => $request->vendocumentocliente,
                    'venhora' => date('H:i:s'),
                    'venestado' => 'pagado',
                    'venmonto' => $request->venmonto,
                    'venimpuesto' => $request->venimpuesto,
                    'ventotalneto' => $request->ventotalneto,
                    'venobservacion' => $request->venobservacion,
                    'idTipocomprobante' => $request->idTipocomprobante,
                    'idTipopago' => $request->idTipopago,
                    'idEmpleado' => Auth()->user()->idEmpleado,
                ]
            );
            for ($i = 0; $i < sizeof($request->list_productos); $i++) {
                  DetalleVenta::create([
                    'idVenta' => $venta->idVenta,
                    'idProducto' => $request->list_productos[$i],
                    'dvcantidad' => $request->list_quantity[$i],
                    'dvpreciounitario' => $request->list_precios[$i],
                ]);
                $producto = Producto::find($request->list_productos[$i]);
                $producto->update(
                    [
                        'prostock' => $producto->prostock - $request->list_quantity[$i],
                    ]
                );

            }
            $ventatotal= DetalleVenta::Where('idVenta',$venta->idVenta)->get();
            $url = $this->pdf($venta, $ventatotal);

            $venta->docontable()->create(
                [
                    'dconnombre' => 'Venta N°'. $venta->idVenta,
                    'dconfecha' => $venta->venfecha,
                    'dconhora' => $venta->venhora,
                    'idEmpleado' => $venta->idEmpleado,
                    'dconurl' =>  $url,
                ]
                );
        });


        return redirect()->route('ventas.index')
            ->with('success', 'Venta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
            ->with('success', 'Venta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Venta deleted successfully');
    }
    public function pdf($venta, $detalle)
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H-i-s');
        $contenidoPDF = view('venta.ventapdf', compact('venta', 'detalle'))->render();
        $nombreArchivo = 'files/venta' . $fechaActual . '_' . $horaActual . '_' . $venta->idEmpleado . '.pdf';
        $guardararchivo = PDF::loadHTML($contenidoPDF)->output();
        $rutaArchivo = Storage::disk('public')->put($nombreArchivo, $guardararchivo);
        if ($rutaArchivo) {
            return $nombreArchivo;
        }
        return "0";
    }
}
