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
        Schema::create('imprenta_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->default(0);
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('direccion');
            $table->string('dni');
            $table->string('cuit');
            $table->string('institucion')->nullable();
            $table->string('email')->nullable();
            $table->string('archivo')->nullable();
            $table->double('cantidadhojas')->nullable();
            $table->string('tipodeimpresion')->nullable();
            $table->unsignedBigInteger('tipodocumento_id'); // tablas
            $table->string('tamanopapel')->nullable();
            $table->string('tipodepapel')->nullable();      // tipos de papel tabla
            $table->boolean('frentedorso')->nullable();     // 0ambas caras | 1 simple faz
            $table->double('cantidadejemplares')->nullable();

            $table->string('retiraenlocal')->default(1);  // 1 Paso a buscarlo | 2 Enviar x delivery | 3 Enviar a direccion | 4 Otro
            $table->string('lugardeentrega')->default('Local'); // tablas

            $table->string('geoposicion')->nullable(); // tablas
            $table->string('observaciones')->nullable(); // tablas

            $table->double('costoaprox')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->boolean('mostrar')->default(true);

            $table->timestamps();

            $table->foreign('tipodocumento_id')->references('id')->on('imprenta_tipodocumentos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('estado_id')->references('id')->on('estados');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imprenta_pedidos');
    }
};
