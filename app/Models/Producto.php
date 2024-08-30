<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $idProducto
 * @property $pronombre
 * @property $prodescripcion
 * @property $propreciounitario
 * @property $prostock
 * @property $prostockminimo
 * @property $idTipoproducto
 * @property $idUnidadmedida
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleVenta[] $detalleVentas
 * @property TipoProducto $tipoProducto
 * @property Unidadmedida $unidadmedida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    protected $primaryKey = 'idProducto';
    static $rules = [

		'pronombre' => 'required',
		'prodescripcion' => 'required',
		'prostock' => 'required',
		'prostockminimo' => 'required',
		'idTipoproducto' => 'required',
		'idUnidadmedida' => 'required',
        'propreciocompra'=> 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pronombre','prodescripcion','propreciounitario','propreciocompra','prostock','prostockminimo','idTipoproducto','idUnidadmedida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany('App\Models\DetalleCompra', 'idProducto', 'idProducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany('App\Models\DetalleVenta', 'idProducto', 'idProducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoProducto()
    {
        return $this->hasOne(TipoProducto::class, 'idTipoproducto', 'idTipoproducto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidadmedida()
    {
        return $this->hasOne(Unidadmedida::class, 'idUnidadmedida', 'idUnidadmedida');
    }
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
     //Relacion uno a uno polimorfica
    public function solicitud()
    {
        return $this->morphOne(Solicitud::class, 'solicitudable');
    }


}
