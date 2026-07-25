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
         Schema::dropIfExists('donation_allocations');
         Schema::create('donation_allocations', function (Blueprint $table) {
             $table->id();
             $table->bigInteger('item_procurement')->default(0);
             $table->bigInteger('website_operations')->default(0);
             $table->bigInteger('creative_work')->default(0);
             $table->bigInteger('digital_subscriptions')->default(0);
             $table->bigInteger('others')->default(0);
             $table->timestamps();
         });
 
         Schema::table('financial_reports', function (Blueprint $table) {
             $table->string('quarter')->change();
         });
     }
 
     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('donation_allocations');
         Schema::create('donation_allocations', function (Blueprint $table) {
             $table->id();
             $table->bigInteger('operational')->default(0);
             $table->bigInteger('buy_goods')->default(0);
             $table->bigInteger('event')->default(0);
             $table->bigInteger('promotion')->default(0);
             $table->bigInteger('maintenance')->default(0);
             $table->bigInteger('others')->default(0);
             $table->timestamps();
         });
 
         Schema::table('financial_reports', function (Blueprint $table) {
             // In order to revert to enum, SQLite might have issues, but standard way is to modify it back.
             // We can just change it to string or do nothing for SQLite since it's just down.
             // But for standard SQL, we change it back to enum.
             $table->enum('quarter', ['I', 'II', 'III', 'IV'])->change();
         });
     }
};
