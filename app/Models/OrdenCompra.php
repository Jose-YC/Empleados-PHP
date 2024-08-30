<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdenCompra
 *
 * @property $idOrdencompra
 * @property $orcomfecha
 * @property $orcomhora
 * @property $orcomdescripcion
 * @property $orcomtotalneto
 * @property $orcomestado
 * @property $idProveedor
 * @property $idEmpleado
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleCompra[] $detalleCompras
 * @property DocumentosContable[] $documentosContables
 * @property Empleado $empleado
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenCompra extends Model
{
    protected $primaryKey = 'idOrdencompra';
    static $rules = [
		'idProveedor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = [ 'orcomfecha','orcomhora','orcomdescripcion','orcomtotal','orcomestado','idProveedor','idEmpleado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\Models\DetalleCompra', 'idOrdencompra', 'idOrdencompra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentosContables()
    {
        return $this->hasMany('App\Models\DocumentosContable', 'idOrdencompra', 'idOrdencompra');
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
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'idProveedor', 'idProveedor');
    }
    public function docontable()
    {
        return $this->morphOne(DocumentosContable::class, 'docontable');
    }


}
