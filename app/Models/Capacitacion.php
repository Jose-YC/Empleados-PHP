<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Capacitacion
 *
 * @property $idCapacitacion
 * @property $capfechainicio
 * @property $capfechafin
 * @property $capcapacitador
 * @property $created_at
 * @property $updated_at
 *
 * @property Asistencia[] $asistencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Capacitacion extends Model
{
    protected $primaryKey = 'idCapacitacion';
    static $rules = [
        'caparea' => 'required',
        'capfechainicio' => 'required',
        'capfechafin' => 'required',
        'capcapacitador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['capfechainicio', 'capfechafin', 'capcapacitador','idDepartamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany( Asistencia::class, 'idCapacitacion', 'idCapacitacion');
    }

    public function solicitud()
    {
        return $this->morphOne(Solicitud::class, 'solicitudable');
    }

}
