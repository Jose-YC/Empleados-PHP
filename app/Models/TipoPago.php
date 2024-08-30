<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoPago
 *
 * @property $idTipopago
 * @property $tpagotipo
 * @property $created_at
 * @property $updated_at
 *
 * @property DocumentosContable[] $documentosContables
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoPago extends Model
{
    protected $primaryKey = 'idTipopago';
    static $rules = [

		'tpagotipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tpagotipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosContables()
    {
        return $this->hasMany('App\Models\DocumentosContable', 'idTipopago', 'idTipopago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'idTipopago', 'idTipopago');
    }


}
