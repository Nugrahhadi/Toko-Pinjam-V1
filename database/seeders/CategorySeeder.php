<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Buku',
                'slug' => 'buku',
                'description' => 'Koleksi buku bacaan',
                'icon' => '📚',
                'color' => '#3b82f6',
            ],
            [
                'name' => 'Hobi',
                'slug' => 'hobi',
                'description' => 'Perlengkapan dan peralatan hobi',
                'icon' => '🎨',
                'color' => '#f59e0b',
            ],
            [
                'name' => 'Produksi Kreatif',
                'slug' => 'produksi-kreatif',
                'description' => 'Alat dan perlengkapan produksi kreatif',
                'icon' => '🎬',
                'color' => '#8b5cf6',
            ],
            [
                'name' => 'Perlengkapan Acara',
                'slug' => 'perlengkapan-acara',
                'description' => 'Barang dan perlengkapan untuk acara',
                'icon' => '🎉',
                'color' => '#10b981',
            ],
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
                'description' => 'Peralatan olahraga',
                'icon' => '⚽',
                'color' => '#ef4444',
            ],
            [
                'name' => 'Pakaian Formal',
                'slug' => 'pakaian-formal',
                'description' => 'Pakaian resmi dan formal',
                'icon' => '👔',
                'color' => '#06b6d4',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']], // Unique constraint
                $category                      // Data to insert/update
            );
        }
    }
}
