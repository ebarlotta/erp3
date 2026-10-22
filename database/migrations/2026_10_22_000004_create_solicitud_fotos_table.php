<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repa_solicitud_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->constrained('repa_solicitudes')->cascadeOnDelete();
            $table->string('path', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repa_solicitud_fotos');
    }
};