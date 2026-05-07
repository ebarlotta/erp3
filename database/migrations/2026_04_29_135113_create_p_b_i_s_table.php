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
        // Schema::create('p_b_i_s', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->text('description')->nullable();
        //     $table->enum('type', ['FEATURE', 'BUG', 'TASK', 'TECH_DEBT']);
        //     $table->enum('status', ['PENDING', 'IN_PROGRESS', 'DONE'])->default('PENDING');
        //     $table->integer('priority')->default(0);  // Número más alto = mayor prioridad
        //     $table->integer('story_points')->nullable();
        //     $table->foreignId('assigned_to')->nullable()->constrained('users');
        //     $table->foreignId('project_id')->constrained('pm_projects')->onDelete('cascade');
        //     $table->integer('urgencia')->nullable()->comment('1-10');
        //     $table->integer('valor_negocio')->nullable()->comment('1-10');
        //     $table->integer('costo_estimado')->nullable()->comment('1-10');
        //     $table->integer('tiempo_limite_dias')->nullable();
        //     $table->boolean('prioridad_automatica')->default(false);

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_b_i_s');
    }
};
