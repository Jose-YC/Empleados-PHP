<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoComprobanteVenta
 *
 * @property $idTipocomprobante
 * @property $tcomcomprobante
 * @property $created_at
 * @property $updated_at
 *
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoComprobanteVenta extends Model
{
    protected $primaryKey = 'idTipocomprobante';
    static $rules = [

		'tcomcomprobante' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'tcomcomprobante'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'idTipocomprobante', 'idTipocomprobante');
    }


}
