<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $idVenta
 * @property $venfecha
 * @property $vendocumentocliente
 * @property $venhora
 * @property $venestado
 * @property $venmonto
 * @property $venimpuesto
 * @property $ventotalneto
 * @property $venobservacion
 * @property $idTipocomprobante
 * @property $idTipopago
 * @property $idEmpleado
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleVenta[] $detalleVentas
 * @property DocumentosContable[] $documentosContables
 * @property Empleado $empleado
 * @property TipoComprobanteVenta $tipoComprobanteVenta
 * @property TipoPago $tipoPago
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    protected $primaryKey = 'idVenta';
    static $rules = [
		'venmonto' => 'required',
		'venimpuesto' => 'required',
		'ventotalneto' => 'required',
		'idTipocomprobante' => 'required',
		'idTipopago' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'venfecha','vendocumentocliente','venhora','venestado','venmonto','venimpuesto','ventotalneto','venobservacion','idTipocomprobante','idTipopago','idEmpleado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany('App\Models\DetalleVenta', 'idVenta', 'idVenta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosContables()
    {
        return $this->hasMany('App\Models\DocumentosContable', 'idVenta', 'idVenta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'idEmpleado', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoComprobanteVenta()
    {
        return $this->hasOne('App\Models\TipoComprobanteVenta', 'idTipocomprobante', 'idTipocomprobante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPago()
    {
        return $this->hasOne('App\Models\TipoPago', 'idTipopago', 'idTipopago');
    }
    public function docontable()
    {
        return $this->morphOne(DocumentosContable::class, 'docontable');
    }


}
