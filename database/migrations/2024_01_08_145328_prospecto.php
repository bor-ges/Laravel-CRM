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
        Schema::create('prospectos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->string('conhecimento');
            $table->string('origem');
            $table->string('nome_oportunidade');
            $table->string('tipo_oportunidade');
            $table->dateTime('data');
            $table->string('estimado');
            $table->string('probabilidade');
            $table->string('proximo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospectos');
    }
};
