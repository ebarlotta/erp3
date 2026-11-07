<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_recetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_terminado_id'); // El producto que se fabrica
            $table->unsignedBigInteger('materia_prima_id'); // El ingrediente
            $table->double('cantidad'); // Cuánto lleva
            $table->timestamps();

            $table->foreign('producto_terminado_id')->references('id')->on('elemento_productos');
            $table->foreign('materia_prima_id')->references('id')->on('elemento_productos');
            $table->unique(['producto_terminado_id', 'materia_prima_id']); // Evita duplicar el mismo ingrediente
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_recetas');
    }
};