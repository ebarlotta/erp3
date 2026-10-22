<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_agenda_disponibilidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparador_id')->constrained('users')->cascadeOnDelete();
            $table->enum('tipo', ['recurrente', 'puntual']);
            $table->tinyInteger('dia_semana')->nullable(); // 0=domingo ... 6=sábado, solo recurrente
            $table->date('fecha')->nullable();             // solo puntual
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['reparador_id', 'tipo']);
            $table->index(['reparador_id', 'fecha']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_agenda_disponibilidad');
    }
};