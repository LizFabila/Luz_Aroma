<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            // Identificador único
            $table->id('cliente_id');

            // Campos principales
            $table->string('nombre', 255);
            $table->string('direccion_envio', 255);
            $table->string('telefono', 15)->nullable();
            $table->string('correo_electronico', 100);

            // Timestamps automáticos
            $table->timestamps();

            // Soft delete
            $table->softDeletes();

            // Índices
            $table->unique('correo_electronico', 'idx_clientes_correo_unico');

            // Comentarios para la tabla (opcional)
            $table->comment('Tabla de clientes del sistema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
