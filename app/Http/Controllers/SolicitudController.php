<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Solicitud;
use App\Models\TipoProducto;
use App\Models\Unidadmedida;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;



/**
 * Class SolicitudController
 * @package App\Http\Controllers
 */
class SolicitudController extends Controller
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

        $departameno = Auth()->User()->empleado->departamento->depnombre;
        if ($departameno == 'Compras' || $departameno == 'compras') {
            $solicituds = Solicitud::Where('solestado', 'aprobado')->get();
        } else {
            if (
                $this->verificarPermiso('panel.Abastecimiento') && $this->verificarPermiso('panel.Compras') &&
                $this->verificarPermiso('panel.Ventas') && $this->verificarPermiso('panel.Finanzas') &&
                $this->verificarPermiso('panel.Adminstrar') && $this->verificarPermiso('panel.Seguridad')
            ) {
                $solicituds = Solicitud::all();
            } else {
                if ($this->verificarPermiso('panel.Abastecimiento')) {

                    $solicituds = Solicitud::whereHasMorph('solicitudable', [Producto::class], function ($query) {
                    })->get();
                } else if ($this->verificarPermiso('panel.Compras')) {
                    return "hola";
                    $solicituds = Solicitud::whereHasMorph('solicitudable', [OrdenCompra::class], function ($query) {
                    })->get();
                } else if ($this->verificarPermiso('panel.Finanzas')) {
                    return "hola";
                    $solicituds = Solicitud::all();
                } else if ($this->verificarPermiso('panel.Administrar')) {

                    $solicituds = Solicitud::whereHasMorph('solicitudable', [Empleado::class], function ($query) {
                    })->get();
                } else if ($this->verificarPermiso('panel.Seguridad')) {
                    return "hola";
                    $solicituds = Solicitud::whereHasMorph('solicitudable', [Capacitacion::class], function ($query) {
                    })->get();
                } else {
                    $solicituds = [];
                }
            }
        }
        return view('solicitud.index', compact('solicituds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $solicitud = new Solicitud();
        return view('solicitud.create', compact('solicitud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('tipo')) {
            return $this->storeproductos($request);
        } else {
            return $this->storgeneral($request);
        }
        //    return $this->storgeneral($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        return view('solicitud.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        return view('solicitud.edit', compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitud $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {

        request()->validate(Solicitud::$rules);
        $objeto = $solicitud->solicitudable_type::find($solicitud->solicitudable_id);

        DB::transaction(function () use ($request, $solicitud, $objeto) {

            if ($solicitud->idEmpleado != Auth()->user()->idEmpleado) {

                if ($objeto instanceof Capacitacion) {

                    if ($request->solestado == "aprobado" or $request->solestado == "observado") {

                        if ($request->solestado == "aprobado") {

                            $solicitud->update([
                                'solestado' => $request->solestado
                            ]);
                            $empleados = Empleado::Where('idDepartamento', $objeto->idDepartamento)->get();

                            foreach ($empleados as $empleado) {

                                Asistencia::create([
                                    'idEmpleado' => $empleado->idEmpleado,
                                    'idCapacitacion' => $objeto->idCapacitacion,
                                    'idDepartamento' => $objeto->idDepartamento
                                ]);
                            }
                        } else {
                            $solicitud->update(
                                [
                                    'solestado' => $request->solestado,
                                    'solobservacion' => $request->solobservacion
                                ]
                            );
                        }
                    }
                } elseif ($objeto instanceof Producto) {

                    if ($request->solestado == "entregado" and $request->solestado != $solicitud->solestado ) {

                        $objeto->update([
                            'prostock' => $objeto->prostock + $solicitud->solcantidad
                        ]);
                    }
                    $solicitud->update(
                        ['solestado' => $request->solestado]
                    );
                }
            } else { //mismo usario que creo la solicitud

                if ($objeto instanceof Producto) {

                    $prod = Producto::find($solicitud->solicitudable_id);
                    Storage::disk('public')->delete($solicitud->solarchivo);
                    $url = $this->pdfproducto($prod, $request->solcantidad);
                    $solicitud->update(
                        [
                            'solarchivo' => $url,
                            'solestado' => 'pendiente',
                            'soldescripcion' => $request->soldescripcion
                        ]
                    );
                }
            }
        });
        return redirect()->route('solicituds.index')
            ->with('success', 'Solicitud updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicituds.index')
            ->with('success', 'Solicitud deleted successfully');
    }

    public function storeproductos($request)
    {

        request()->validate(Solicitud::$rules);
        $empleado = Empleado::find(Auth()->user()->idEmpleado);
        $departameno = Departamento::where('idDepartamento', $empleado->idDepartamento)->first();

        DB::transaction(function () use ($request, $empleado, $departameno) {
            $prod = Producto::find($request->prod);
            $url = $this->pdfproducto($prod, $request->solcantidad);
            $prod->solicitud()->create(
                [
                    'solnombre' => $request->solnombre,
                    'solarchivo' => $url,
                    'solcantidad' => $request->solcantidad,
                    'soldescripcion' => $request->soldescripcion,
                    'idEmpleado' => $empleado->idEmpleado,
                    'idDepartamento' => $departameno->idDepartamento,
                ]
            );
        });
        return redirect()->route('solicituds.index')
            ->with('success', 'Solicitud created successfully.');
    }
    public function storgeneral($request)
    {
        $empleado = Empleado::find(Auth()->user()->idEmpleado);

        DB::transaction(function () use ($request, $empleado) {

            if ($request->file('solarchivo')) {
                $url = Storage::disk('public')->put('img', $request->file('solarchivo'));
                $solicitud = Solicitud::create(
                    [
                        'solnombre' => $request->solnombre,
                        'soldescripcion' => $request->soldescripcion,
                        'solarchivo' => $url,
                        'solcantidad' => $request->solcantidad,
                        'solestado' => 'pendiente',
                        'idEmpleado' => Auth()->user()->idEmpleado,
                        'idDepartamento' => $empleado->idDepartamento,
                    ]
                );
                $solicitud->solicitudable_id = $solicitud->idSolicitud;
                $solicitud->solicitudable_type = get_class($solicitud);

                $solicitud->save();
            }
        });
        return redirect()->route('solicituds.index')
            ->with('success', 'Solicitud updated successfully');
    }
    // public function storecapacitacion($producto, $cantidad)
    // {
    //     $solicitud = new Solicitud();
    //     $usuarios = Auth()->user()->usunombre; //nombre del solicitante
    //     $empleado = Empleado::find(Auth()->user()->idEmpleado);
    //     $departameno = Departamento::where('idDepartamento', $empleado->idDepartamento)->first(); //area
    //     $medida = Unidadmedida::find($producto->idUnidadmedida);
    //     $tipoprod = TipoProducto::find($producto->idTipoproducto);
    //     $fechaActual = date('Y-m-d');
    //     $horaActual = date('H-i-s');
    //     $contenidoPDF = view('producto.solproductopdf', compact('producto', 'medida', 'cantidad', 'solicitud', 'usuarios', 'departameno'))->render();
    //     $nombreArchivo = 'files/solicitud_' . $fechaActual . '-' . $horaActual . '_' . $producto->pronombre . '.pdf';
    //     $guardararchivo = PDF::loadHTML($contenidoPDF)->output();
    //     $rutaArchivo = Storage::disk('public')->put($nombreArchivo, $guardararchivo);
    //     if ($rutaArchivo) {
    //         return $nombreArchivo;
    //     }
    //     return "0";
    // }


    public function pdfproducto($producto, $cantidad)
    {
        $solicitud = new Solicitud();
        $usuarios = Auth()->user()->usunombre; //nombre del solicitante
        $empleado = Empleado::find(Auth()->user()->idEmpleado);
        $departameno = Departamento::where('idDepartamento', $empleado->idDepartamento)->first(); //area
        $medida = Unidadmedida::find($producto->idUnidadmedida);
        $tipoprod = TipoProducto::find($producto->idTipoproducto);
        $fechaActual = date('Y-m-d');
        $horaActual = date('H-i-s');
        $contenidoPDF = view('producto.solproductopdf', compact('producto', 'medida', 'cantidad', 'solicitud', 'usuarios', 'departameno'))->render();
        $nombreArchivo = 'files/solicitud_' . $fechaActual . '-' . $horaActual . '_' . $producto->pronombre . '.pdf';
        $guardararchivo = PDF::loadHTML($contenidoPDF)->output();
        $rutaArchivo = Storage::disk('public')->put($nombreArchivo, $guardararchivo);
        if ($rutaArchivo) {
            return $nombreArchivo;
        }
        return "0";
    }
    public function verificarPermiso($permiso)
    {
        $user = auth()->user();
        $roles = $user->roles;
        $permissions = $roles->flatMap(function ($role) {
            return $role->permissions;
        });
        $permissionNames = $permissions->pluck('name');
        if ($permissionNames->contains($permiso)) {
            return  true;
        } else {
            return  false;
        }
    }
}
