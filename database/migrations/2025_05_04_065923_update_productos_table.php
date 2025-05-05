<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Modificar tabla productos sin eliminarla
        Schema::table('productos', function (Blueprint $table) {
            // Ejemplo: cambiar longitud de un campo varchar
            $table->string('nombre_producto', 150)->change();

            // Ejemplo: agregar nuevo campo nullable
            $table->string('codigo_barras', 50)->nullable()->after('nombre_producto');

            // Ejemplo: modificar tipo de campo
            $table->decimal('precio', 12, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Revertir cambios
            $table->string('nombre_producto', 100)->change();
            $table->dropColumn('codigo_barras');
            $table->decimal('precio', 10, 2)->change();
        });
    }
};
