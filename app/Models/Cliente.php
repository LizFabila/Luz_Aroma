<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    // Configuración de tabla
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
    public $timestamps = true; // Asegura que created_at y updated_at funcionen

    // Campos para soft delete
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'direccion_envio',
        'telefono',
        'correo_electronico'
        // No incluir campos auto-manejados como timestamps
    ];

    // Conversiones de tipo
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    // Validación de campos únicos
    public static function rules($id = null)
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion_envio' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:100|unique:clientes,correo_electronico,'.$id.',cliente_id',
            'telefono' => 'nullable|string|max:15'
        ];
    }
}
