<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_elemento_almacen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elemento_id');
            $table->unsignedBigInteger('almacen_id');
            $table->double('existencia')->default(0);
            $table->double('stock_minimo')->default(0);
            $table->timestamps();

            $table->foreign('elemento_id')->references('id')->on('elementos');
            $table->foreign('almacen_id')->references('id')->on('stock_almacen');
            $table->unique(['elemento_id', 'almacen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_elemento_almacen');
    }
};