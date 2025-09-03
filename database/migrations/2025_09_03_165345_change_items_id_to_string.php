<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, drop foreign key constraints from related tables
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
        });

        // Store existing data (though we'll lose it due to ID change)
        $existingItems = DB::table('items')->get();

        // Drop the items table
        Schema::dropIfExists('items');

        // Recreate with string id
        Schema::create('items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('original_price', 15, 2)->nullable();
            $table->decimal('donation_price', 10, 2);
            $table->integer('stock')->default(1);
            $table->json('images')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 8, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('completeness')->nullable();
            $table->text('how_to_use')->nullable();
            $table->text('how_to_borrow')->nullable();
            $table->timestamps();
        });

        // Update related tables to use string item_id
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('item_id')->change();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->string('item_id')->change();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });

        // Note: We're not restoring the data since it would need new string IDs
        // and we only have 2 test items. They can be recreated manually.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, drop foreign key constraints from related tables
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
        });

        // Drop the new table
        Schema::dropIfExists('items');

        // Recreate the original structure
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // This creates auto-incrementing bigint
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('original_price', 15, 2)->nullable();
            $table->decimal('donation_price', 10, 2);
            $table->integer('stock')->default(1);
            $table->json('images')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 8, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('completeness')->nullable();
            $table->text('how_to_use')->nullable();
            $table->text('how_to_borrow')->nullable();
            $table->timestamps();
        });

        // Update related tables back to use bigint item_id
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->change();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });

        Schema::table('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->change();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }
};
