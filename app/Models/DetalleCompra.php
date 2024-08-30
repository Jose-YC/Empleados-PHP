<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 *
 * @property $idDetallecompra
 * @property $idOrdencompra
 * @property $idProducto
 * @property $dcomcantidad
 * @property $dcompreciounitario
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdenCompra $ordenCompra
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleCompra extends Model
{
    protected $primaryKey = 'idDetallecompra';
    static $rules = [

		'idOrdencompra' => 'required',
		'idProducto' => 'required',
		'dcomcantidad' => 'required',
        'dcomunitario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'idOrdencompra','idProducto','dcomcantidad','dcompreciounitario','dcomunitario'];


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
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'idProducto', 'idProducto');
    }


}
