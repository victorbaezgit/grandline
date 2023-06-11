<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $id_coleccion
 * @property $nombre_producto
 * @property $precio
 * @property $descripcion
 * @property $imagen_producto
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrito[] $carritos
 * @property Coleccione $coleccione
 * @property Comentario[] $comentarios
 * @property Talla[] $tallas
 * @property Unionpedido[] $unionpedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'id_coleccion' => 'required',
		'nombre_producto' => 'required',
		'precio' => 'required',
		'descripcion' => 'required',
		'imagen_producto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_coleccion','nombre_producto','precio','descripcion','imagen_producto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carritos()
    {
        return $this->hasMany('App\Models\Carrito', 'id_producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coleccione()
    {
        return $this->hasOne('App\Models\Coleccione', 'id', 'id_coleccion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario', 'id_producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tallas()
    {
        return $this->hasMany('App\Models\Talla', 'id_producto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unionpedidos()
    {
        return $this->hasMany('App\Models\Unionpedido', 'id_producto', 'id');
    }
    

}
