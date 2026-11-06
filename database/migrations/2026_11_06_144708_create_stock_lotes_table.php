<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_lotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elemento_producto_id');
            $table->unsignedBigInteger('almacen_id');
            $table->string('lote'); 
            $table->date('vencimiento')->nullable();
            $table->double('existencia')->default(0);
            $table->timestamps();

            $table->foreign('elemento_producto_id')->references('id')->on('elemento_productos');
            $table->foreign('almacen_id')->references('id')->on('stock_almacen');
            $table->unique(['elemento_producto_id', 'almacen_id', 'lote']); // Evita duplicar el mismo lote en el mismo almacén
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_lotes');
    }
};