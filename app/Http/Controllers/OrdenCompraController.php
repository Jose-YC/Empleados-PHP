<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use App\Models\DetalleCompra;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class OrdenCompraController
 * @package App\Http\Controllers
 */
class OrdenCompraController extends Controller
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
        $ordenCompras = OrdenCompra::all();

        return view('orden-compra.index', compact('ordenCompras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $proveedores = Proveedore::pluck('provrazonsocial', 'idProveedor');
        $productosRepuestos = Producto::where('idTipoProducto', '!=', 2)->get();
        $ordenCompra = new OrdenCompra();

        return view('orden-compra.create', compact('ordenCompra', 'proveedores', 'productosRepuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrdenCompra::$rules);

        DB::transaction(function () use ($request) {
            $ordencompra = OrdenCompra::create(
                [
                    'orcomfecha' => date('Y-m-d'),
                    'orcomhora' => date('H:i:s'),
                    'orcomdescripcion' => $request->orcomdescripcion,
                    'orcomtotal' => $request->orcomtotal,
                    'orcomestado' => 'pagado',
                    'idProveedor' => $request->idProveedor,
                    'idEmpleado' =>  Auth()->user()->idEmpleado,
                ]
            );
            for ($i = 0; $i < sizeof($request->list_productos); $i++) {
                DetalleCompra::create([
                    'idOrdencompra' => $ordencompra->idOrdencompra,
                    'idProducto' => $request->list_productos[$i],
                    'dcomcantidad' => $request->list_quantity[$i],
                    'dcomunitario'=>$request->list_precios[$i],
                ]);
            }
            $compratotal = DetalleCompra::Where('idOrdencompra', $ordencompra->idOrdencompra)->get();
            $url = $this->pdf($ordencompra, $compratotal);

            $ordencompra->docontable()->create(
                [
                    'dconnombre' => 'Compra N°' . $ordencompra->idOrdencompra,
                    'dconfecha' => $ordencompra->orcomfecha,
                    'dconhora' => $ordencompra->orcomhora,
                    'idEmpleado' => $ordencompra->idEmpleado,
                    'dconurl' =>  $url,
                ]
            );
        });



        return redirect()->route('orden-compras.index')
            ->with('success', 'OrdenCompra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenCompra $ordenCompra)
    {
        return view('orden-compra.show', compact('ordenCompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenCompra $ordenCompra)
    {
        return view('orden-compra.edit', compact('ordenCompra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrdenCompra $ordenCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenCompra $ordenCompra)
    {
        request()->validate(OrdenCompra::$rules);

        $ordenCompra->update($request->all());

        return redirect()->route('orden-compras.index')
            ->with('success', 'OrdenCompra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(OrdenCompra $ordenCompra)
    {
        $ordenCompra->delete();

        return redirect()->route('orden-compras.index')
            ->with('success', 'OrdenCompra deleted successfully');
    }
    public function pdf($compra, $detalle)
    {
        $fechaActual = date('Y-m-d');
        $horaActual = date('H-i-s');
        $contenidoPDF = view('orden-compra.comprapdf', compact('compra', 'detalle'))->render();
        $nombreArchivo = 'files/Compra' . $fechaActual . '_' . $horaActual . '_' . $compra->idEmpleado . '.pdf';
        $guardararchivo = PDF::loadHTML($contenidoPDF)->output();
        $rutaArchivo = Storage::disk('public')->put($nombreArchivo, $guardararchivo);
        if ($rutaArchivo) {
            return $nombreArchivo;
        }
        return "0";
    }
}
