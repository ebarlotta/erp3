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
        Schema::create('registro_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('collectionId');
            $table->string('collectionStatus');
            $table->string('paymentId');
            $table->string('status');
            $table->string('externalReference');
            $table->string('preferenceId');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_pagos');
    }
};
