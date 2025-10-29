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
        Schema::create('forma_promocions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forma_id');
            $table->unsignedBigInteger('promocion_id');

            $table->foreign('forma_id')->references('id')->on('formadepagos');
            $table->foreign('promocion_id')->references('id')->on('promocions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forma_promocions');
    }
};
