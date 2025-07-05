<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Tools & Home',
                'slug' => 'tools-home',
                'description' => 'Alat-alat rumah tangga dan pertukangan',
                'icon' => '🔧',
                'color' => '#ef4444',
            ],
            [
                'name' => 'Accounting',
                'slug' => 'accounting',
                'description' => 'Peralatan akuntansi dan kantor',
                'icon' => '📊',
                'color' => '#3b82f6',
            ],
            [
                'name' => 'Cleaning',
                'slug' => 'cleaning',
                'description' => 'Peralatan pembersih dan sanitasi',
                'icon' => '🧽',
                'color' => '#10b981',
            ],
            [
                'name' => 'DIY',
                'slug' => 'diy',
                'description' => 'Peralatan Do It Yourself dan craft',
                'icon' => '🔨',
                'color' => '#f59e0b',
            ],
            [
                'name' => 'Cooking & Heating',
                'slug' => 'cooking-heating',
                'description' => 'Peralatan memasak dan pemanas',
                'icon' => '🍳',
                'color' => '#8b5cf6',
            ],
            [
                'name' => 'Gardening',
                'slug' => 'gardening',
                'description' => 'Peralatan berkebun dan tanaman',
                'icon' => '🌱',
                'color' => '#22c55e',
            ],
            [
                'name' => 'Tech & Fitness',
                'slug' => 'tech-fitness',
                'description' => 'Teknologi dan peralatan fitness',
                'icon' => '💪',
                'color' => '#6366f1',
            ],
            [
                'name' => 'Holiday',
                'slug' => 'holiday',
                'description' => 'Peralatan liburan dan traveling',
                'icon' => '🏖️',
                'color' => '#06b6d4',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
