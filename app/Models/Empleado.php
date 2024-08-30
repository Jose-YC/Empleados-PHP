<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $idEmpleado
 * @property $empnombres
 * @property $empapellidop
 * @property $empapellidom
 * @property $empdni
 * @property $empdireccion
 * @property $emptelefono
 * @property $idDepartamento
 * @property $created_at
 * @property $updated_at
 *
 * @property Asistencia[] $asistencias
 * @property Departamento $departamento
 * @property DocumentosContable[] $documentosContables
 * @property OrdenCompra[] $ordenCompras
 * @property Usuario[] $usuarios
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    protected $primaryKey = 'idEmpleado';
    static $rules = [

		'empnombres' => 'required',
		'empapellidop' => 'required',
		'empapellidom' => 'required',
		'empdni' => 'required',
		'empdireccion' => 'required',
		'emptelefono' => 'required',
		'idDepartamento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'empnombres','empapellidop','empapellidom','empdni','empdireccion','emptelefono','idDepartamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany('App\Models\Asistencia', 'idEmpleado', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'idDepartamento', 'idDepartamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosContables()
    {
        return $this->hasMany('App\Models\DocumentosContable', 'idEmpleado', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenCompras()
    {
        return $this->hasMany('App\Models\OrdenCompra', 'idEmpleado', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasOne(User::class, 'idEmpleado', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'idEmpleado', 'idEmpleado');
    }


}
