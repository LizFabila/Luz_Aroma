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
            $table->integer('id_pedido')->nullable();
            $table->integer('id_costo_envio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('envios');
    }
};
