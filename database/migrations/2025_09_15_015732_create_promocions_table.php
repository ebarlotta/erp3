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
        Schema::create('promocions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zona_id');
            $table->unsignedBigInteger('tipodecompra_id');
            $table->double('MontoFijoDESCUENTO');
            $table->double('PorcentajeDESCUENTO');
            $table->double('TopePorTransaccion');
            $table->date('PeriodoDesde');
            $table->date('PeriodoHasta');
            $table->double('TopePorPeriodo');
            $table->string('TopePorTipoPeriodo');
            // $table->unsignedBigInteger('producto_id');
            // $table->unsignedBigInteger('mediodepago_id');
            // $table->unsignedBigInteger('formadepago_id');
            $table->string('Requisito');
            $table->string('DíaDeLaSemana');
            $table->string('Moneda');
            $table->string('Información');
            $table->string('Retira');
            $table->string('Reintegro');
            $table->timestamps();

            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('tipodecompra_id')->references('id')->on('tipo_de_compras');
            
            // $table->foreign('formadepago_id')->references('id')->on('formadepagos');
            // $table->foreign('producto_id')->references('id')->on('productos');
            // $table->foreign('mediodepago_id')->references('id')->on('mediodepagos');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocions');
    }
};
