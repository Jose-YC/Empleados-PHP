<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosFinanciero
 *
 * @property $idEstadofinanciero
 * @property $esfitipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Financiero[] $financieros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadosFinanciero extends Model
{
    protected $primaryKey = 'idEstadofinanciero';
    static $rules = [
		'idEstadofinanciero' => 'required',
		'esfitipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'esfitipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financieros()
    {
        return $this->hasMany('App\Models\Financiero', 'idEstadofinanciero', 'idEstadofinanciero');
    }


}
