<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Tambahkan kolom weight (kg), desimal 2 angka di belakang koma
            if (!Schema::hasColumn('items', 'weight')) {
                $table->decimal('weight', 8, 2)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'weight')) {
                $table->dropColumn('weight');
            }
        });
    }
};
