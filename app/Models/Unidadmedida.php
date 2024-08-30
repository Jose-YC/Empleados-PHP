<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidadmedida
 *
 * @property $idUnidadmedida
 * @property $umednombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidadmedida extends Model
{
    protected $primaryKey = 'idUnidadmedida';
    static $rules = [
		'umednombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'umednombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'idUnidadmedida', 'idUnidadmedida');
    }


}
