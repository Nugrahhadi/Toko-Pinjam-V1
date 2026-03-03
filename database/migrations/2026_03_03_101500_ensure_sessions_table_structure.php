<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Jika tabel sudah ada, pastikan struktur benar
        if (Schema::hasTable('sessions')) {
            // Cek apakah kolom sudah ada, jika tidak tambahkan
            if (!Schema::hasColumn('sessions', 'user_id')) {
                Schema::table('sessions', function (Blueprint $table) {
                    $table->foreignId('user_id')->nullable()->index();
                    $table->string('ip_address', 45)->nullable();
                    $table->text('user_agent')->nullable();
                    $table->longText('payload');
                    $table->integer('last_activity')->index();
                });
            }
        }
    }

    public function down(): void
    {
        // Do nothing - jangan drop tabel sessions
    }
};
