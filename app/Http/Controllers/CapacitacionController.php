<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Capacitacion;
use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class CapacitacionController
 * @package App\Http\Controllers
 */
class CapacitacionController extends Controller
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
        $capacitacions = Capacitacion::all();

        return view('capacitacion.index', compact('capacitacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitud = new Solicitud ();
        $area = Departamento::pluck('depnombre', 'idDepartamento');
        $capacitacion = new Capacitacion();

        return view('capacitacion.create', compact('capacitacion', 'area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* This code is responsible for creating a new Capacitacion (Training) record in the database. */
        $empleado = Empleado::find(Auth()->user()->idEmpleado);
        $empleadosIds = Empleado::where('idDepartamento',$request->caparea)->select('idEmpleado','empnombres','empapellidop','empapellidom','empdni')->get() ;

        $departameno = Departamento::where('idDepartamento', $request->caparea)->pluck('depnombre');
        request()->validate(Capacitacion::$rules);
        DB::transaction(function () use ($request, $empleado, $empleadosIds, $departameno) {
            $capacitacion = Capacitacion::create([
                'capcapacitador' => $request->capcapacitador,
                'capfechainicio' => $request->capfechainicio,
                'capfechafin' => $request->capfechafin,
                'idDepartamento'=> $request->caparea
            ]);

            $asistencias = [];
            foreach ($empleadosIds as $empleadoId) {
                $asistencias[] = [
                    'idEmpleado' => $empleadoId->idEmpleado,
                    'nombre_completo' => $empleadoId->empnombres ." ".$empleadoId->empapellidop." ".$empleadoId->empapellidom,
                    'dni' => $empleadoId->empdni,
                ];
            }



            $url = $this->pdf($capacitacion, $asistencias,$departameno[0]);
            $capacitacion->solicitud()->create([
                'solnombre' => "Solicitud de Capacitacion para el area de ". $departameno[0] ,
                'solarchivo' => $url,
                'soldescripcion' => $request->capdescripcion,
                'idEmpleado' => $empleado->idEmpleado,
                'idDepartamento' => $empleado->Departamento->idDepartamento,
            ]);



        });





        return redirect()->route('capacitacions.index')
            ->with('success', 'Capacitacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitacion $capacitacion)
    {
        $asistencia = Asistencia::Where('idCapacitacion', $capacitacion->idCapacitacion)->select('idEmpleado', 'asistio', 'justificacion')->get();
        //return $asistencia;
        return view('capacitacion.show', compact('capacitacion', 'asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitacion $capacitacion)
    {
        $area = Departamento::pluck('depnombre', 'idDepartamento');
        return view('capacitacion.edit', compact('capacitacion', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Capacitacion $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacitacion $capacitacion)
    {
        request()->validate(Capacitacion::$rules);

        $capacitacion->update($request->all());

        return redirect()->route('capacitacions.index')
            ->with('success', 'Capacitacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Capacitacion $capacitacion)
    {
        $capacitacion->delete();

        return redirect()->route('capacitacions.index')
            ->with('success', 'Capacitacion deleted successfully');
    }

    /**
     * @param Capacitacion $capacitacion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function asistencia(Capacitacion $capacitacion)
    {

        $asistencia = $capacitacion->asistencias;
     if ($capacitacion->solicitud->solestado == 'pendiente') {
        return redirect()->route('capacitacions.index')
        ->with('success', 'Capacitacion no esta aprobada');
     } else {
        if ($capacitacion->capfechainicio >= date('Y-m-d') || $capacitacion->capfechafin >= date('Y-m-d')) {
            return view('asistencia.edit', compact('asistencia', 'capacitacion'));
        } else {
            return redirect()->route('capacitacions.index')
                ->with('success', 'Capacitacion no disponible');
        }
     }


        // return $asistencia;

    }

    /**
     * guardarasisitencias a newly created resource in guardarasisitencias.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function guardar(Request $request)
    {

        foreach ($request->asistio as $asistenciaId => $asistio) {
            $asistencia = Asistencia::find($asistenciaId);
            $asistencia->update([
                'asistio' => $asistio,

                'justificacion' => $request->justificante[$asistenciaId]
            ]);
        }
        return redirect()->route('capacitacions.index')
            ->with('success', 'Capacitacion updated successfully');
    }
    public function pdf($capacitacion, $asistencias,$departameno)
    {

        $usuarios = Auth()->user()->usunombre; //nombre del solicitante
        $empleado = Empleado::find(Auth()->user()->idEmpleado); //empleado del usuario
        $departamenos = Departamento::where('idDepartamento', $empleado->idDepartamento)->first(); //area del solicitante
        $fechaActual = date('Y-m-d');
        $horaActual = date('H-i-s');
        $contenidoPDF = view('capacitacion.solcapacitacion', compact('capacitacion', 'asistencias', 'usuarios', 'departamenos'))->render();
        $nombreArchivo = 'files/solicitud_Capacitacion_' . $fechaActual . '_' . $horaActual . '_' . $departameno . '.pdf';
        $guardararchivo = PDF::loadHTML($contenidoPDF)->output();
        $rutaArchivo = Storage::disk('public')->put($nombreArchivo, $guardararchivo);
        if ($rutaArchivo) {
            return $nombreArchivo;
        }
        return "0";
    }
}
