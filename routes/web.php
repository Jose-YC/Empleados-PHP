<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\DocumentosContableController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosFinancieroController;
use App\Http\Controllers\FinancieroController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TipoComprobanteVentaController;
use App\Http\Controllers\TipoPagoController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\UnidadmedidaController;
use App\Http\Controllers\VentaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('index');
})->middleware('auth');
Route::middleware(['auth'])->group(function () {
    //tipo-pagos
    Route::resource('asistencias', AsistenciaController::class)->names('asistencias');
    Route::resource('capacitaciones', CapacitacionController::class)->names('capacitacions')->parameters([
        'capacitaciones' => 'capacitacion'
    ]);
    Route::resource('departamentos', DepartamentoController::class)->names('departamentos');
    Route::resource('detalle-compras', DetalleCompraController::class)->names('detallecompras')->parameters([
        'detalle-compras' => 'detalleCompra'
    ]);
    Route::resource('detalle-ventas', DetalleVentaController::class)->names('detalleventas')->parameters([
        'detalle-ventas' => 'detalleVenta'
    ]);
    Route::resource('documentos-contables', DocumentosContableController::class)->names('documentos-contables')->parameters([
        'documentos-contables' => 'documentosContable'
    ]);

    Route::resource('empleados', EmpleadoController::class)->names('empleados');
    Route::resource('estados-fincieros', EstadosFinancieroController::class)->names('estadosfincieros')->parameters([
        'estados-fincieros' => 'estadosFinanciero'
    ]);
    Route::resource('financieros', FinancieroController::class)->names('financieros');
    Route::resource('orden-compras', OrdenCompraController::class)->names('orden-compras')->parameters([
        'orden-compras' => 'ordenCompra'
    ]);
    Route::resource('productos', ProductoController::class)->names('productos');
    Route::resource('proveedores', ProveedoreController::class)->names('proveedores');

    Route::resource('tipo-comprobanteventas', TipoComprobanteVentaController::class)->names('tipo-comprobante-ventas')->parameters([
        'tipo-comprobanteventas' => 'tipoComprobanteVenta'
    ]);
    Route::resource('tipo-pagos', TipoPagoController::class)->names('tipo-pagos')->parameters([
        'tipo-pagos' => 'tipoPago'
    ]);
    Route::resource('tipo-productos', TipoProductoController::class)->names('tipoproductos')->parameters([
        'tipo-productos' => 'tipoproducto'
    ]);
    Route::resource('unidades-medida', UnidadmedidaController::class)->names('unidadesmedida')->parameters([
        'unidades-medida' => 'unidadmedida'
    ]);
    // Route::resource('usuarios', UserController::class)->names('usuarios');
    Route::resource('ventas', VentaController::class)->names('ventas');
    Route::resource('solicitudes', SolicitudController::class)->names('solicituds')->parameters([
        'solicitudes' => 'solicitud'
    ]);
    Route::resource('roles',RoleController::class)->names('roles')->parameters([
        'roles' => 'role'
    ]);
    Route::resource('permisos',PermissioController::class)->names('permisos')->parameters([
        'permisos' => 'permiso'
    ]);
    //asist
    Route::get('capacitaciones/{capacitacion}/asist', [CapacitacionController::class, 'asistencia'])->name('capacitacions.asist');
    Route::POST('capacitaciones/guardar', [CapacitacionController::class, 'guardar'])->name('capacitacions.guardar');
    Route::get('productos/{producto}/solicitud', [ProductoController::class,'createsolicitud'])->name('producto.productosolicitud');

});
