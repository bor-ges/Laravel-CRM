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
            $table->string('cliente');
            $table->string('id_cliente')->autoIncrement();
            $table->string('descr_cliente');
            $table->string('descr_projeto');
            $table->string('valor_estimado');
            $table->string('descr_dores');
            $table->date('data_contato');
            $table->string('indicacao');
            $table->string('chance_convercao');
            $table->string('situacao');
            $table->string('motivo');
            $table->date('data_reabordar');
            $table->boolean('confidencial');
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
