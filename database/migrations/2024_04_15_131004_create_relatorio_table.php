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
        Schema::create('relatorio', function (Blueprint $table) {
            $table->id();
            $table->string('report_date');
            $table->string('related_project');
            $table->string('entry_time');
            $table->string('dep_time');
            $table->string('intv_dep');
            $table->string('intv_entry');
            $table->string('report_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorio');
    }
};
