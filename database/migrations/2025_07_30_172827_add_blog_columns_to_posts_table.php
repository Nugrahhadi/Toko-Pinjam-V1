<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }
            if (!Schema::hasColumn('posts', 'description')) {
                $table->text('description')->nullable()->after('slug');
            }
            if (!Schema::hasColumn('posts', 'featured_image')) {
                $table->string('featured_image')->nullable()->after('description');
            }
            if (!Schema::hasColumn('posts', 'views')) {
                $table->integer('views')->default(0)->after('featured_image');
            }
            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->after('author_phone');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('posts', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('posts', 'featured_image')) {
                $table->dropColumn('featured_image');
            }
            if (Schema::hasColumn('posts', 'views')) {
                $table->dropColumn('views');
            }
            if (Schema::hasColumn('posts', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
