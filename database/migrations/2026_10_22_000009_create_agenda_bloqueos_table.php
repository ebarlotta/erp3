<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_agenda_bloqueos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reparador_id')->constrained('users')->cascadeOnDelete();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('motivo', 150)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['reparador_id', 'fecha_inicio', 'fecha_fin']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_agenda_bloqueos');
    }
};