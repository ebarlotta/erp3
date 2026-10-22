<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('categoria_id')->constrained('categorias')->restrictOnDelete();
            $table->string('titulo', 150);
            $table->text('descripcion');
            $table->string('direccion', 200);
            $table->string('localidad', 100);
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
            $table->enum('urgencia', ['normal', 'urgente', 'muy_urgente'])->default('normal');
            $table->decimal('presupuesto_estimado', 12, 2)->nullable();
            $table->enum('estado', [
                'abierta',
                'con_presupuestos',
                'adjudicada',
                'en_curso',
                'finalizada',
                'cancelada',
            ])->default('abierta');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['estado', 'categoria_id']);
            $table->index('cliente_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_solicitudes');
    }
};