<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignaVenta extends Model
{
    use SoftDeletes;

    protected $table = 'asignaventas';
    protected $primaryKey = 'id_asigna_ventas';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = [
        'cantidad',
        'subtotal',
        'precio',
        'id_venta',
        'id_producto'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta', 'id_venta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
