<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->constrained('repa_solicitudes')->cascadeOnDelete();
            $table->foreignId('reparador_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('moneda_id')->constrained('monedas')->restrictOnDelete();
            $table->decimal('monto', 12, 2);
            $table->unsignedInteger('plazo_dias');
            $table->unsignedInteger('garantia_meses')->nullable();
            $table->text('comentario')->nullable();
            $table->enum('estado', ['enviado', 'aceptado', 'rechazado', 'vencido'])->default('enviado');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['solicitud_id', 'estado']);
            $table->index('reparador_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_presupuestos');
    }
};