<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->integer('id_envio')->autoIncrement();
            $table->string('numero_seguimiento', 100)->nullable();
            $table->date('fecha_envio')->nullable();
            $table->string('direccion_destino', 255)->nullable();
            $table->string('estado_paquete', 100)->nullable();

            // Asegurar que estos tipos coincidan con las tablas referenciadas
            $table->integer('id_pedido')->nullable()->unsigned();
            $table->integer('id_costo_envio')->nullable()->unsigned();

            $table->timestamps();
            $table->softDeletes();

            // Claves foráneas con tipos explícitos
            $table->foreign('id_pedido')
                ->references('id_pedido')
                ->on('pedidos')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('id_costo_envio')
                ->references('id_costo_envio')
                ->on('costos_envios')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }
    public function down()
    {
        // No hacer nada para evitar pérdida de datos
    }
};
