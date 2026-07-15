<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->enum('quarter', ['I', 'II', 'III', 'IV']);
            $table->string('pdf_path')->nullable();
            $table->timestamps();
            $table->unique(['year', 'quarter']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_reports');
    }
};
