<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('maquinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('numero_serie')->unique();
            $table->string('modelo');
            $table->string('marca');
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['activa', 'detenida', 'mantenimiento'])->default('activa');
            $table->unsignedBigInteger('linea_id');
            $table->timestamps();
            
            $table->foreign('linea_id')->references('id')->on('lineas_produccion')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('maquinas');
    }
};
