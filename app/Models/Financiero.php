<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Financiero
 *
 * @property $idFinanciero
 * @property $finanio
 * @property $fintipo
 * @property $idcomprobante
 * @property $idEstadofinanciero
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadosFinanciero $estadosFinanciero
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Financiero extends Model
{
    protected $primaryKey = 'idFinanciero';
    static $rules = [

		'finanio' => 'required',
		'fintipo' => 'required',
		'idcomprobante' => 'required',
		'idEstadofinanciero' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'finanio','fintipo','idcomprobante','idEstadofinanciero'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadosFinanciero()
    {
        return $this->hasOne('App\Models\EstadosFinanciero', 'idEstadofinanciero', 'idEstadofinanciero');
    }


}
