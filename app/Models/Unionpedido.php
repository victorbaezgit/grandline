<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unionpedido
 *
 * @property $id
 * @property $id_usuario
 * @property $id_producto
 * @property $id_pedido
 * @property $talla
 * @property $cantidad
 * @property $precio_unitario
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unionpedido extends Model
{
    
    static $rules = [
		'id_usuario' => 'required',
		'id_producto' => 'required',
		'id_pedido' => 'required',
		'talla' => 'required',
		'cantidad' => 'required',
		'precio_unitario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario','id_producto','id_pedido','talla','cantidad','precio_unitario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id', 'id_pedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}
