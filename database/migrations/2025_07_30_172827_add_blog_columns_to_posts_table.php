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
            $table->string('slug')->unique()->after('title');
            $table->text('description')->nullable()->after('slug');
            $table->string('featured_image')->nullable()->after('description');
            $table->integer('views')->default(0)->after('featured_image');
            $table->foreignId('user_id')->nullable()->constrained()->after('author_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description', 'featured_image', 'views']);
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
