<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'fragancia',
        'precio',
        'stock_min',
        'stock_max',
        'existencias'
    ];

    const UPDATED_AT = 'updated_at';
}
