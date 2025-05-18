<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Verificar si la tabla ya existe para no crearla de nuevo
        if (!Schema::hasTable('Asigna_Ventas')) {
            Schema::create('Asigna_Ventas', function (Blueprint $table) {
                $table->integer('id_asigna_venta')->autoIncrement();
                $table->integer('id_venta');
                $table->unsignedBigInteger('id_producto');
                $table->integer('cantidad')->default(1);
                $table->decimal('precio_unitario', 12, 2);
                $table->decimal('subtotal', 12, 2)->storedAs('cantidad * precio_unitario');
                $table->timestamps();
                $table->softDeletes();

                // Claves foráneas
                $table->foreign('id_venta')
                    ->references('id_venta')
                    ->on('ventas')
                    ->onDelete('cascade');

                $table->foreign('id_producto')
                    ->references('id_producto')
                    ->on('productos')
                    ->onDelete('cascade');
            });
        } else {
            // Si la tabla ya existe, solo agregamos las columnas que puedan faltar
            Schema::table('Asigna_Ventas', function (Blueprint $table) {
                if (!Schema::hasColumn('Asigna_Ventas', 'deleted_at')) {
                    $table->softDeletes();
                }

                if (!Schema::hasColumn('Asigna_Ventas', 'subtotal')) {
                    $table->decimal('subtotal', 12, 2)->storedAs('cantidad * precio_unitario')->after('precio_unitario');
                }

                // Verificar y agregar claves foráneas si no existen
                if (!Schema::hasColumn('Asigna_Ventas', 'id_venta')) {
                    $table->integer('id_venta')->after('id_asigna_venta');
                }

                if (!Schema::hasColumn('Asigna_Ventas', 'id_producto')) {
                    $table->unsignedBigInteger('id_producto')->after('id_venta');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // En un entorno de producción, probablemente no quieras eliminar la tabla
        // Schema::dropIfExists('Asigna_Ventas');

        // En lugar de eso, puedes eliminar solo las claves foráneas
        Schema::table('Asigna_Ventas', function (Blueprint $table) {
            $table->dropForeign(['id_venta']);
            $table->dropForeign(['id_producto']);
        });
    }
};
