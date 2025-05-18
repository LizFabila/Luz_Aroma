<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasTable('pedidos') && Schema::hasTable('costos_envios')) {
            Schema::table('envios', function (Blueprint $table) {
                if (Schema::hasColumn('envios', 'id_pedido')) {
                    $table->foreign('id_pedido')
                        ->references('id_pedido')
                        ->on('pedidos')
                        ->onDelete('set null')
                        ->onUpdate('cascade');
                }

                if (Schema::hasColumn('envios', 'id_costo_envio')) {
                    $table->foreign('id_costo_envio')
                        ->references('id_costo_envio')
                        ->on('costos_envios')
                        ->onDelete('set null')
                        ->onUpdate('cascade');
                }
            });
        }
    }

    public function down()
    {
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['id_pedido']);
            $table->dropForeign(['id_costo_envio']);
        });
    }
};
