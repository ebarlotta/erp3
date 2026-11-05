<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_almacen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_almacen');
    }
};