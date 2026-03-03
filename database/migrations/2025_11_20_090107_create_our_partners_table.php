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
        Schema::create('our_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Partner
            $table->string('url')->nullable(); // Link ke website Partner
            $table->string('logo_path'); // Path logo
            $table->integer('position')->default(0); // Posisi untuk urutan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_partners');
    }
};
