<?php

// database/migrations/xxxx_xx_xx_create_clientes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('cliente_id')->autoIncrement(); // Equivalente a int(11) auto_increment
            $table->string('nombre', 255);
            $table->string('direccion_envio', 255);
            $table->string('telefono', 15)->nullable();
            $table->string('correo_electronico', 100);

            // Campos adicionales que podrías querer agregar:
            $table->timestamps(); // created_at y updated_at
            // $table->softDeletes(); // Descomenta si quieres eliminación suave
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
