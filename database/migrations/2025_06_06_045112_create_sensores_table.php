<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sensores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('unidad_medida');
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->unsignedBigInteger('maquina_id');
            $table->timestamps();
            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensores');
    }
};
