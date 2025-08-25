<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->string('name')->primary();         // Nama counter (contoh: "item_id")
            $table->unsignedBigInteger('value')->default(0); // Nilai terakhir
            $table->timestamps();                      // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
