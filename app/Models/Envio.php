<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Envio extends Model
{
    use SoftDeletes;

    protected $table = 'envios';
    protected $primaryKey = 'id_envio';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'numero_seguimiento',
        'fecha_envio',
        'direccion_destino',
        'estado_paquete',
        'id_pedido',
        'id_costo_envio'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function costo()
    {
        return $this->belongsTo(Costo::class, 'id_costo_envio');
    }
}
