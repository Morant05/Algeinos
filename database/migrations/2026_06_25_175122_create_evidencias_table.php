<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('empleado_id');
            $table->string('nombre');
            $table->unsignedBigInteger('incidencia_id');
            $table->string('tipo', 50);
            $table->text('ruta');
            $table->integer('tamaño');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidencias');
    }
};