<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coleccione
 *
 * @property $id
 * @property $nombre_coleccion
 * @property $imagen_coleccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coleccione extends Model
{
    
    static $rules = [
		'nombre_coleccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_coleccion','imagen_coleccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id_coleccion', 'id');
    }
    

}
