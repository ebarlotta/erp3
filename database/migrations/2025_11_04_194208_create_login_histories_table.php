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
    Schema::create('login_histories', function (Blueprint $table) {
        $table->id();

        // Usuario relacionado
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        $table->string('email_attempted')->nullable(); // Para intentos fallidos

        // Información de red y ubicación
        $table->string('ip_address', 45);
        $table->string('country')->nullable();
        $table->string('city')->nullable();
        $table->string('region')->nullable();
        $table->decimal('latitude', 10, 8)->nullable();
        $table->decimal('longitude', 11, 8)->nullable();
        $table->boolean('is_vpn')->default(false);
        $table->boolean('is_proxy')->default(false);
        $table->boolean('is_tor')->default(false);

        // Información del dispositivo
        $table->text('user_agent')->nullable();
        $table->string('device_type')->nullable(); // mobile, desktop, tablet
        $table->string('platform')->nullable(); // Windows, iOS, Android
        $table->string('browser')->nullable(); // Chrome, Firefox, Safari
        $table->string('browser_version')->nullable();
        $table->string('device_fingerprint')->nullable();

        // Contexto de autenticación
        $table->boolean('login_successful')->default(true);
        $table->string('failure_reason')->nullable();
        $table->string('auth_method')->default('password');
        $table->string('two_factor_type')->nullable();
        $table->integer('failed_attempts_before')->default(0);

        // Gestión de sesión
        $table->string('session_id')->nullable();
        $table->timestamp('login_at');
        $table->timestamp('logout_at')->nullable();
        $table->enum('logout_type', ['manual', 'timeout', 'forced'])->nullable();
        $table->integer('session_duration')->nullable();

        // Detección de anomalías
        $table->boolean('suspicious_activity')->default(false);
        $table->text('suspicious_reason')->nullable();
        $table->string('risk_score')->default('low'); // low, medium, high, critical
        $table->json('alert_triggers')->nullable(); // ['geo_distance', 'new_device', 'unusual_time']

        $table->timestamps();

        // Índices para búsquedas eficientes
        $table->index(['user_id', 'login_at']);
        $table->index(['ip_address', 'login_at']);
        $table->index(['suspicious_activity', 'login_at']);
        $table->index(['login_successful', 'login_at']);
    });
}

    // public function up(): void
    // {
    //     Schema::create('login_histories', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained()->onDelete('cascade');
    //         $table->string('ip_address', 45);
    //         $table->text('user_agent')->nullable();
    //         $table->timestamp('login_at');
    //         $table->timestamps();

    //         $table->index(['user_id', 'login_at']);
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_histories');
    }
};
