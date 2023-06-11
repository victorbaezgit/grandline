<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $id_usuario
 * @property $precio_total
 * @property $direccion
 * @property $codigoPostal
 * @property $localidad
 * @property $pais
 * @property $telefono
 * @property $fecha_compra
 * @property $created_at
 * @property $updated_at
 *
 * @property PedidosUnion[] $pedidosUnions
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'id_usuario' => 'required',
		'precio_total' => 'required',
		'direccion' => 'required',
		'codigoPostal' => 'required',
		'localidad' => 'required',
		'pais' => 'required',
		'telefono' => 'required',
		'fecha_compra' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario','precio_total','direccion','codigoPostal','localidad','pais','telefono','fecha_compra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unionpedidos()
    {
        return $this->hasMany('App\Models\UnionPedido', 'id_pedido', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_usuario');
    }
    

}
