<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Talla
 *
 * @property $id
 * @property $id_producto
 * @property $tipo_talla
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Talla extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'tipo_talla' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto','tipo_talla','stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    

}
