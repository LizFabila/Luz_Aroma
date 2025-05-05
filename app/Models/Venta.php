<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'fecha_venta'];

    protected $fillable = [
        'fecha_venta',
        'monto_total',
        'cliente_id'
    ];

    protected $casts = [
        'fecha_venta' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
