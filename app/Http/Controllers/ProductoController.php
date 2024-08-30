<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\Unidadmedida;
use Illuminate\Http\Request;
use App\Models\Solicitud;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
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
    public function index(Request $request)
    {
        if ($request->id == 0) {
            $productos = Producto::all();
        } else {
            $productos = Producto::where('idTipoproducto', $request->id)->get();
        }
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipoProducto = TipoProducto::pluck('idTipoproducto','tpronombre');
        $tipoUnidad = Unidadmedida::pluck('idUnidadmedida','umednombre');
        $producto = new Producto();
        return view('producto.create', compact('producto', 'tipoProducto', 'tipoUnidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $producto = Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {

        $tipoProducto = TipoProducto::pluck('tpronombre','idTipoproducto');
        $tipoUnidad = Unidadmedida::pluck('umednombre','idUnidadmedida');
        return view('producto.edit', compact('producto', 'tipoProducto', 'tipoUnidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
    public function createsolicitud(Request $request)
    {

        $prod = Producto::find($request->producto);
        $solicitud = new Solicitud();
        $aux = Solicitud::whereHasMorph('solicitudable', [Producto::class], function ($query) use ($prod) {
            $query->where('solicitudable_id', $prod->idProducto);
        })->get();

        //si existe devuvelve un hola
        //si no devuelve un error
        if ($aux->count() > 0) {
            return redirect()->route('productos.index')
                ->with('success', 'Ya existe una solicitud para este producto');
        } else {
            return view('producto.productosolicitud', compact('prod', 'solicitud'));;
        }
    }
}
