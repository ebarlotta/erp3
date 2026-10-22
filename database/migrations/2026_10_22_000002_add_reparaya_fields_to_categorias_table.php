<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            // Ampliar nombrecategoria de varchar(30) a varchar(100)
            $table->string('nombrecategoria', 100)->change();

            // Columnas nuevas, todas nullable o con default para no romper registros existentes
            $table->string('slug', 60)->nullable()->unique()->after('nombrecategoria');
            $table->string('icono', 100)->nullable()->after('slug');
            $table->boolean('activo')->default(true)->after('icono');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn(['slug', 'icono', 'activo']);
            $table->string('nombrecategoria', 30)->change();
        });
    }
};