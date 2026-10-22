<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->constrained('repa_solicitudes')->cascadeOnDelete();
            $table->foreignId('presupuesto_id')->unique()->constrained('repa_presupuestos')->cascadeOnDelete();
            $table->foreignId('cliente_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reparador_id')->constrained('users')->cascadeOnDelete();
            $table->dateTime('fecha_hora');
            $table->unsignedInteger('duracion_min')->default(60);
            $table->enum('estado', ['propuesta', 'confirmada', 'realizada', 'cancelada'])->default('propuesta');
            $table->text('notas')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['reparador_id', 'fecha_hora']);
            $table->index(['cliente_id', 'fecha_hora']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_citas');
    }
};