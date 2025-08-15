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
        Schema::create('registro_reguisitos_tipotramites', function (Blueprint $table) {
            $table->id();
            $table->string('descripcionrequisitotipotramite');
            $table->unsignedBigInteger('tipotramite_id');
            $table->double('precio');
            $table->double('cantidad');
            $table->timestamps();

            $table->foreign('tipotramite_id')->references('id')->on('registro_tipotramites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_reguisitos_tipotramites');
    }
};
