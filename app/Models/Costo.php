<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costo extends Model
{
    use SoftDeletes;

    protected $table = 'costos_envio';
    protected $primaryKey = 'id_costo_envio';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'zona',
        'precio_base',
        'precio_por_km',
        'descripcion'
    ];

    protected $casts = [
        'precio_base' => 'decimal:2',
        'precio_por_km' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
