<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        // Solo verifica que la tabla existe con la estructura correcta
        if (Schema::hasTable('ventas')) {
            Schema::table('ventas', function (Blueprint $table) {
                // Verifica las columnas existentes
                if (!Schema::hasColumn('ventas', 'cliente_id')) {
                    $table->foreignId('cliente_id')->constrained('clientes', 'cliente_id');
                }
            });
        }
    }

    public function down()
    {
        // No hacer nada para evitar perder datos
    }
};
