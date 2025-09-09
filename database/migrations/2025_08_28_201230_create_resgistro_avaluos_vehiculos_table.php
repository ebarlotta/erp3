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
        Schema::create('resgistro_avaluos_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('mtm');
            $table->string('vehiculo');
            $table->double('anio2000')->default(null);
            $table->double('anio2001')->default(null);
            $table->double('anio2002')->default(null);
            $table->double('anio2003')->default(null);
            $table->double('anio2004')->default(null);
            $table->double('anio2005')->default(null);
            $table->double('anio2006')->default(null);
            $table->double('anio2007')->default(null);
            $table->double('anio2008')->default(null);
            $table->double('anio2009')->default(null);
            $table->double('anio2010')->default(null);
            $table->double('anio2011')->default(null);
            $table->double('anio2012')->default(null);
            $table->double('anio2013')->default(null);
            $table->double('anio2014')->default(null);
            $table->double('anio2015')->default(null);
            $table->double('anio2016')->default(null);
            $table->double('anio2017')->default(null);
            $table->double('anio2018')->default(null);
            $table->double('anio2019')->default(null);
            $table->double('anio2020')->default(null);
            $table->double('anio2021')->default(null);
            $table->double('anio2022')->default(null);
            $table->double('anio2023')->default(null);
            $table->double('anio2024')->default(null);
            $table->double('anio2025')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resgistro_avaluos_vehiculos');
    }
};
