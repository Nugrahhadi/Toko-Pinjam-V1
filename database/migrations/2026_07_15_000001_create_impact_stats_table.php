<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('impact_stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saved_money')->default(0);
            $table->integer('co2_prevented')->default(0);
            $table->integer('waste_prevented')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('impact_stats');
    }
};
