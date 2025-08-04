<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable(); // Legacy column
            $table->string('featured_image')->nullable(); // New featured image column
            $table->string('category');
            $table->string('author');
            $table->string('author_phone')->nullable();
            $table->string('author_email')->nullable();
            $table->longText('content');
            $table->unsignedInteger('likes')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Indexes untuk performance
            $table->index('slug');
            $table->index('category');
            $table->index('status');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
