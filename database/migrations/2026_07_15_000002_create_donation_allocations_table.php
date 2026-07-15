<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donation_allocations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('operational')->default(0);
            $table->bigInteger('buy_goods')->default(0);
            $table->bigInteger('event')->default(0);
            $table->bigInteger('promotion')->default(0);
            $table->bigInteger('maintenance')->default(0);
            $table->bigInteger('others')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_allocations');
    }
};
