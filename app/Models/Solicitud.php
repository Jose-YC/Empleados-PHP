<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitud
 *
 * @property $idSolicitud
 * @property $solnombre
 * @property $solarchivo
 * @property $soldescripcion
 * @property $solobservacion
 * @property $solestado
 * @property $idEmpleado
 * @property $idDepartamento
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Solicitud extends Model
{

    protected $primaryKey = 'idSolicitud';
    static $rules = [
        'solnombre' => 'required',
        'soldescripcion' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['solnombre', 'solarchivo','solcantidad', 'soldescripcion', 'solobservacion', 'solestado', 'idEmpleado', 'idDepartamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'idDepartamento', 'idDepartamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'idEmpleado', 'idEmpleado');
    }
    //Relacion uno a uno polimorfica

    public function solicitud()
    {
        return $this->morphOne(Solicitud::class, 'solicitudable');
    }
    
   public function solicitudable()
    {
        return $this->morphTo();
    }

}
