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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_contrato');
            $table->longText('descricao');
            $table->string('tipo');
            $table->date('data_contrato');
            $table->string('numero_contrato');
            $table->string('arquivo_contrato');
            $table->string('situacao');
            $table->string('motivo_recusado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
