<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'fecha_pedido'];

    protected $fillable = [
        'fecha_pedido',
        'total',
        'estado_pedido',
        'cliente_id'
    ];

    protected $casts = [
        'fecha_pedido' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}

