<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('elemento_producto_id');
            $table->unsignedBigInteger('almacen_id');
            $table->string('tipo'); // entrada, salida, ajuste, transferencia
            $table->string('motivo')->nullable();
            $table->double('cantidad');
            $table->double('saldo'); // saldo resultante después del movimiento
            $table->string('lote')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->timestamps();

            $table->foreign('elemento_producto_id')->references('id')->on('elemento_productos');
            $table->foreign('almacen_id')->references('id')->on('stock_almacen');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->index(['elemento_producto_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movimientos');
    }
};