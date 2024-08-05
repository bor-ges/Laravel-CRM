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
        Schema::create('abordagens', function (Blueprint $table) {
            $table->id();
            $table->string('nome_abordagem');
            $table->string('tipo');
            $table->string('meio_contato');
            $table->date('data_abordagem');
            $table->string('descricao');
            $table->string('arquivo_abordagem');
            $table->string('objecao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abordagems');
    }
};
