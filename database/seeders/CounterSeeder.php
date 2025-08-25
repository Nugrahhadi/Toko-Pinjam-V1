<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CounterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('counters')->updateOrInsert(
            ['name' => 'item_id'], // nama counter khusus untuk tabel items
            [
                'value' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
