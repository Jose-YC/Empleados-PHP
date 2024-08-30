<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $idAsistencia
 * @property $idEmpleado
 * @property $idCapacitacion
 * @property $idDepartamento
 * @property $asistio
 * @property $justificacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Capacitacion $capacitacion
 * @property Departamento $departamento
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    protected $primaryKey = 'idAsistencia';
    static $rules = [

		'idEmpleado' => 'required',
		'idCapacitacion' => 'required',
		'idDepartamento' => 'required',
		// 'asistio' => 'required',
		// 'justificacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'idEmpleado','idCapacitacion','idDepartamento','asistio','justificacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function capacitacion()
    {
        return $this->hasOne('App\Models\Capacitacion', 'idCapacitacion', 'idCapacitacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'idDepartamento', 'idDepartamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'idEmpleado', 'idEmpleado');
    }


}
