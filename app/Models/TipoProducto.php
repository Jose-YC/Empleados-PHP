<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoProducto
 *
 * @property $idTipoproducto
 * @property $tpronombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoProducto extends Model
{
    protected $primaryKey = 'idTipoproducto';
    static $rules = [

		'tpronombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'tpronombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'idTipoproducto', 'idTipoproducto');
    }


}
