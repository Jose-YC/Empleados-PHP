<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVenta
 *
 * @property $idDventa
 * @property $idVenta
 * @property $idProducto
 * @property $dvcantidad
 * @property $dvpreciounitario
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Venta $venta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleVenta extends Model
{
    protected $primaryKey = 'idDventa';
    static $rules = [

		'idVenta' => 'required',
		'idProducto' => 'required',
		'dvcantidad' => 'required',
		'dvpreciounitario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'idVenta','idProducto','dvcantidad','dvpreciounitario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'idProducto', 'idProducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function venta()
    {
        return $this->hasOne('App\Models\Venta', 'idVenta', 'idVenta');
    }


}
