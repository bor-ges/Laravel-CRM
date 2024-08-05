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
        Schema::create('tecnico', function (Blueprint $table) {
            $table->id();
            $table->string('tec_name');
            $table->string('tec_func');
            $table->string('tec_entrada');
            $table->string('tec_saida');
            $table->string('tec_interv');
            $table->string('tec_grupo');
            $table->string('tec_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnico');
    }
};
