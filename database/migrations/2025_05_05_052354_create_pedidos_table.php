<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id_pedido')->autoIncrement();  // Coincide exactamente con clientes
            $table->date('fecha_pedido')->nullable(false);
            $table->decimal('total', 10, 2)->nullable();
            $table->string('estado_pedido', 50)->default('Pendiente');
            $table->integer('cliente_id');  // Mismo tipo que en clientes

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id')
                ->references('cliente_id')
                ->on('clientes')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
