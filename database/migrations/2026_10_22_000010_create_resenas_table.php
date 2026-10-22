<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_resenas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cita_id')->unique()->constrained('repa_citas')->cascadeOnDelete();
            $table->foreignId('cliente_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reparador_id')->constrained('users')->cascadeOnDelete();
            $table->tinyInteger('puntuacion'); // 1 a 5
            $table->text('comentario')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('reparador_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_resenas');
    }
};