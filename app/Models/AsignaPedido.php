<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignaPedido extends Model
{
    use SoftDeletes;

    protected $table = 'asigna_pedidos';
    protected $primaryKey = 'id_asignapedido';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
