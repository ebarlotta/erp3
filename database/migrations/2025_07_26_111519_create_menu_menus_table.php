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
        Schema::create('menu_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_nombre_menu');
            $table->unsignedBigInteger('menu_categoria_id');
            $table->boolean('menu_habilitada')->default(true);
            $table->timestamps();

            $table->foreign('menu_categoria_id')->references('id')->on('menu_categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_menus');
    }
};
