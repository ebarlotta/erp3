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
        Schema::create('actor_reparador', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('actor_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('iniciales', 4)->nullable();
            $table->string('especialidad');           // plomeria, electricidad, pintura
            $table->string('matricula')->nullable();
            $table->string('zona');
            $table->string('domicilio')->default('CABA');
            $table->unsignedTinyInteger('experiencia_anios')->default(0);
            $table->boolean('verificado')->default(false);
            $table->boolean('activo')->default(true);
            $table->text('sobre_mi')->nullable();
            $table->string('urlfoto')->nullable();
            $table->decimal('calificacion_promedio', 3, 2)->default(0);
            $table->unsignedInteger('total_resenas')->default(0);
            $table->unsignedInteger('total_trabajos')->default(0);
            $table->decimal('porcentaje_recomendacion', 5, 2)->default(0);
            $table->unsignedInteger('tiempo_respuesta_promedio')->default(0); // minutos
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('actor_id')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparadores');
    }
};
