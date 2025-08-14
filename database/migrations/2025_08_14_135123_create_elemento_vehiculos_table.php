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
        Schema::create('elemento_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('patente');
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->integer('ano');
            $table->unsignedBigInteger('elemento_id');

            $table->foreign('elemento_id')->references('id')->on('elementos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elemento_vehiculos');
    }
};
