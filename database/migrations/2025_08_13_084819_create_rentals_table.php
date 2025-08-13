<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // opsional, kalau admin buat manual
            $table->unsignedInteger('quantity')->default(1);
            $table->date('start_date')->index();
            $table->date('end_date')->index();
            $table->enum('status', ['booked','ongoing','returned','cancelled'])->default('booked')->index();
            $table->timestamp('returned_at')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
