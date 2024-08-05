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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('num_contrato');
            $table->string('tipo_contrato');
            $table->string('contratante');
            $table->string('endereco');
            $table->string('prazo_contratual');
            $table->string('data_inicio');
            $table->string('prev_termino');
            $table->string('img_capa');
            $table->string('resumo');
            $table->string('search');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};

