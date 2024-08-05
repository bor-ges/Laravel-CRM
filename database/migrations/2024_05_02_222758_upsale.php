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
        Schema::create('upsales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contratos');
            $table->foreign('id_contratos')->references('id')->on('contratos');
            $table->longText('descr_contratos');
            $table->string('gera_prospecto');
            $table->string('gera_demanda');
            $table->string('status_demanda');
            $table->date('data_fim_demanda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upsale');
    }
};
