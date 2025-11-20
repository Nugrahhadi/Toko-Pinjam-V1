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
    Schema::create('media_partners', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama media (misal: Kompas, Detik)
        $table->string('url')->nullable(); // Link ke artikel/website media
        $table->string('logo_path'); // Path atau URL logo media
        $table->integer('position')->default(0); // Posisi untuk urutan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_partners');
    }
};
