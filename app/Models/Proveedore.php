<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $idProveedor
 * @property $provdoc
 * @property $provtelefono
 * @property $provcorreo
 * @property $provdireccion
 * @property $provrazonsocial
 * @property $created_at
 * @property $updated_at
 *
 * @property OrdenCompra[] $ordenCompras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    protected $primaryKey = 'idProveedor';
    static $rules = [

		'provdoc' => 'required',
		'provtelefono' => 'required',
		'provcorreo' => 'required',
		'provdireccion' => 'required',
		'provrazonsocial' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'provdoc','provtelefono','provcorreo','provdireccion','provrazonsocial'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenCompras()
    {
        return $this->hasMany('App\Models\OrdenCompra', 'idProveedor', 'idProveedor');
    }


}
