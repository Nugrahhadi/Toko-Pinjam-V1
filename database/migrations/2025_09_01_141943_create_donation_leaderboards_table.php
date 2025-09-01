<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("donation_leaderboards", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->decimal("amount", 14, 2)->default(0);
            $table->unsignedSmallInteger("position")->nullable(); // opsional: jika ingin set urutan manual
            $table->timestamps();

            $table->unique("user_id"); // satu baris per user
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("donation_leaderboards");
    }
};
