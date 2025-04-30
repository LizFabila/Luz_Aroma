<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'direccion_envio',
        'telefono',
        'correo_electronico'
    ];
}
