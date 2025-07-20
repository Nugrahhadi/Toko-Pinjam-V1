<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Contoh items (dipersingkat)
            [
                'name' => 'Steam Cleaner',
                'description' => 'Pembersih uap untuk berbagai permukaan, efektif menghilangkan noda membandel.',
                'donation_price' => 25000,
                'price_unit' => 'per day',
                'stock' => 3,
                'condition' => 'excellent',
                'category' => 'cleaning',
                'location' => 'Purwokerto',
                'is_featured' => true,
                'images' => ['/images/steam-cleaner.jpg'],
            ],
            [
                'name' => 'Carpet Cleaner',
                'description' => 'Pembersih karpet profesional untuk membersihkan karpet secara mendalam.',
                'donation_price' => 30000,
                'price_unit' => 'per day',
                'stock' => 2,
                'condition' => 'good',
                'category' => 'cleaning',
                'location' => 'Jakarta',
                'is_featured' => true,
                'images' => ['/images/carpet-cleaner.jpg'],
            ],
            // ... lanjutkan dengan item lainnya ...
        ];

        foreach ($items as $itemData) {
            $category = Category::where('slug', $itemData['category'])->first();
            $location = Location::where('city', $itemData['location'])->first();

            if ($category && $location) {
                $slug = Str::slug($itemData['name']);

                Item::updateOrCreate(
                    ['slug' => $slug], // cari berdasarkan slug unik
                    [
                        'name' => $itemData['name'],
                        'description' => $itemData['description'],
                        'donation_price' => $itemData['donation_price'],
                        'price_unit' => $itemData['price_unit'],
                        'stock' => $itemData['stock'],
                        'available_stock' => $itemData['stock'],
                        'condition' => $itemData['condition'],
                        'category_id' => $category->id,
                        'location_id' => $location->id,
                        'is_featured' => $itemData['is_featured'] ?? false,
                        'images' => json_encode($itemData['images']), // pastikan ini string JSON
                        'usage_instructions' => 'Silakan baca manual penggunaan. Gunakan dengan hati-hati dan kembalikan dalam kondisi bersih.',
                        'slug' => $slug,
                    ]
                );
            }
        }
    }
}
