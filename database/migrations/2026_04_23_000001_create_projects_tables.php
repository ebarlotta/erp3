<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pm_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'paused', 'completed', 'planning'])->default('planning');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->string('color')->default('#3b82f6');
            $table->date('start_date')->nullable();
            $table->date('target_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pm_pbi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['FEATURE', 'BUG', 'TASK', 'TECH_DEBT']);
            $table->enum('status', ['PENDING', 'IN_PROGRESS', 'DONE'])->default('PENDING');
            $table->integer('priority')->default(0);  // Número más alto = mayor prioridad
            $table->integer('story_points')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->foreignId('project_id')->constrained('pm_projects')->onDelete('cascade');
            $table->integer('urgencia')->nullable()->comment('1-10');
            $table->integer('valor_negocio')->nullable()->comment('1-10');
            $table->integer('costo_estimado')->nullable()->comment('1-10');
            $table->integer('tiempo_limite_dias')->nullable();
            $table->boolean('prioridad_automatica')->default(false);

            $table->timestamps();
        });

        Schema::create('pm_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbi_id')->constrained('pm_pbi')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->date('due_date')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pm_time_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbi_id')->constrained('pm_pbi')->onDelete('cascade');
            $table->foreignId('task_id')->nullable()->constrained('pm_tasks')->onDelete('set null');
            $table->timestamp('started_at');
            $table->timestamp('ended_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('pm_pbi_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbi_id')->constrained('pm_pbi')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pm_time_entries');
        Schema::dropIfExists('pm_tasks');
        Schema::dropIfExists('pm_projects');
        Schema::dropIfExists('pm_pbi');
        Schema::dropIfExists('pm_pbi_users');
    }
};