<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
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
        $empleados = Empleado::all();

        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $user = new User();
        $departamentos = Departamento::pluck('depnombre', 'idDepartamento');
        $roles = Role::all();

        return view('empleado.create', compact('empleado', 'departamentos', 'roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Empleado::$rules);
         $empleado = Empleado::create([
            'empnombres' => $request->empnombres,
            'empapellidop' => $request->empapellidop,
            'empapellidom' => $request->empapellidom,
            'empdni' => $request->empdni,
            'empdireccion' => $request->empdireccion,
            'emptelefono' => $request->emptelefono,
            'idDepartamento' => $request->idDepartamento
         ]);
        User::create([
            'usunombre' => $request->empnombres." ". $request->empapellidop,
            'usuemail' => $request->usuemail,
            'usucontra' =>Hash::make($request->usucontra),
            'idEmpleado' => $empleado->idEmpleado
        ])->syncRoles($request->rols);


        return redirect()->route('empleados.index')
            ->with('success', 'Empleado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::pluck('depnombre', 'idDepartamento');
        $roles = Role::all();
        $user = User::find($empleado->idEmpleado);

        return view('empleado.edit', compact('empleado', 'departamentos', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {


        request()->validate(Empleado::$rules);
        $usuario = User::find($empleado->idEmpleado);
        $empleado->update([
            'empnombres' => $request->empnombres,
            'empapellidop' => $request->empapellidop,
            'empapellidom' => $request->empapellidom,
            'empdni' => $request->empdni,
            'empdireccion' => $request->empdireccion,
            'emptelefono' => $request->emptelefono,
            'idDepartamento' => $request->idDepartamento
        ]);
        $empleado->user->update([
            'usunombre' => $request->usunombre == "" ? $usuario->usunombre : $usuario->usunombre,
            'usuemail' => $request->usuemail,
            'usucontra' =>$request->usucontra == "" ? $usuario->usucontra : Hash::make($request->usucontra)  ,
        ]);
        $empleado->user->syncRoles($request->rols);


        return redirect()->route('empleados.index')
            ->with('success', 'Empleado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado deleted successfully');
    }
}
