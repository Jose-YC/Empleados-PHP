<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentosContable
 *
 * @property $idDocumentocontable
 * @property $dconnombre
 * @property $dconfecha
 * @property $dconhora
 * @property $idOrdencompra
 * @property $idEmpleado
 * @property $idTipopago
 * @property $idVenta
 * @property $docdescripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property OrdenCompra $ordenCompra
 * @property TipoPago $tipoPago
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DocumentosContable extends Model
{
    protected $primaryKey = 'idDocumentocontable';
    static $rules = [
        'dconnombre' => 'required',
        'dconfecha' => 'required',
        'dconhora' => 'required',
        'idEmpleado' => 'required',
        'dconurl' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dconnombre', 'dconfecha', 'dconhora', 'idEmpleado', 'dconurl'];


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
    public function ordenCompra()
    {
        return $this->hasOne('App\Models\OrdenCompra', 'idOrdencompra', 'idOrdencompra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoPago()
    {
        return $this->hasOne('App\Models\TipoPago', 'idTipopago', 'idTipopago');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'idVenta', 'idVenta');
    }
    //docontable
    public function docontable()
    {
        return $this->morphTo();
    }
}
