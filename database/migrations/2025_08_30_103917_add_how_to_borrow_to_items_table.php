<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table("items", function (Blueprint $table) {
            $table->text("how_to_borrow")->nullable()->after("how_to_use");
        });
    }

    public function down(): void
    {
        Schema::table("items", function (Blueprint $table) {
            $table->dropColumn("how_to_borrow");
        });
    }
};
