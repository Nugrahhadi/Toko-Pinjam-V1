<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Hapus kolom-kolom yang diminta
            if (Schema::hasColumn('items', 'available_stock'))    $table->dropColumn('available_stock');
            if (Schema::hasColumn('items', 'condition'))          $table->dropColumn('condition');
            if (Schema::hasColumn('items', 'price_unit'))         $table->dropColumn('price_unit');
            if (Schema::hasColumn('items', 'usage_instructions')) $table->dropColumn('usage_instructions');
            if (Schema::hasColumn('items', 'is_featured'))        $table->dropColumn('is_featured');
            if (Schema::hasColumn('items', 'is_active'))          $table->dropColumn('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Kembalikan lagi kalau di-rollback
            $table->integer('available_stock')->default(1);
            $table->string('condition')->default('good');
            $table->string('price_unit')->default('per day');
            $table->text('usage_instructions')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
        });
    }
};
