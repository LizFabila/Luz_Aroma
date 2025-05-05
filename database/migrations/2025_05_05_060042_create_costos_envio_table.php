<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->integer('id_costo_envio')->autoIncrement();
            $table->string('zona', 100)->nullable();
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->decimal('precio_por_km', 10, 2)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::dropIfExists('costos');
    }
};
