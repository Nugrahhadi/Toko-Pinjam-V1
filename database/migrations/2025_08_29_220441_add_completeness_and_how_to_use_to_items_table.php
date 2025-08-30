<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Tambah kolom 'completeness' (kelengkapan) & 'how_to_use' (cara pakai)
            if (!Schema::hasColumn('items', 'completeness')) {
                $table->text('completeness')->nullable()->after('description');
            }
            if (!Schema::hasColumn('items', 'how_to_use')) {
                $table->text('how_to_use')->nullable()->after('completeness');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Hapus kembali kolom jika ada
            if (Schema::hasColumn('items', 'how_to_use')) {
                $table->dropColumn('how_to_use');
            }
            if (Schema::hasColumn('items', 'completeness')) {
                $table->dropColumn('completeness');
            }
        });
    }
};
