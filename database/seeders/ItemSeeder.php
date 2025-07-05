<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Cleaning items
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
            // Tools items
            [
                'name' => 'Drill (cordless)',
                'description' => 'Bor tanpa kabel untuk berbagai kebutuhan pertukangan dan perbaikan rumah.',
                'donation_price' => 20000,
                'price_unit' => 'per day',
                'stock' => 5,
                'condition' => 'good',
                'category' => 'tools-home',
                'location' => 'Purwokerto',
                'is_featured' => true,
                'images' => ['/images/drill.jpg'],
            ],
            [
                'name' => 'Projector',
                'description' => 'Proyektor HD untuk presentasi dan home theater, dilengkapi dengan kabel HDMI.',
                'donation_price' => 50000,
                'price_unit' => 'per day',
                'stock' => 2,
                'condition' => 'excellent',
                'category' => 'tech-fitness',
                'location' => 'Bandung',
                'is_featured' => true,
                'images' => ['/images/projector.jpg'],
            ],
            // Additional items for variety
            [
                'name' => 'Pressure Washer',
                'description' => 'Mesin cuci bertekanan tinggi untuk membersihkan kendaraan dan area outdoor.',
                'donation_price' => 35000,
                'price_unit' => 'per day',
                'stock' => 2,
                'condition' => 'good',
                'category' => 'cleaning',
                'location' => 'Jakarta',
                'images' => ['/images/pressure-washer.jpg'],
            ],
            [
                'name' => 'Circular Saw',
                'description' => 'Gergaji bundar untuk memotong kayu dengan presisi tinggi.',
                'donation_price' => 25000,
                'price_unit' => 'per day',
                'stock' => 3,
                'condition' => 'good',
                'category' => 'tools-home',
                'location' => 'Surabaya',
                'images' => ['/images/circular-saw.jpg'],
            ],
            [
                'name' => 'Portable Generator',
                'description' => 'Generator portabel untuk kebutuhan listrik darurat atau outdoor.',
                'donation_price' => 75000,
                'price_unit' => 'per day',
                'stock' => 1,
                'condition' => 'excellent',
                'category' => 'tools-home',
                'location' => 'Yogyakarta',
                'images' => ['/images/generator.jpg'],
            ],
            [
                'name' => 'Camping Tent (4 person)',
                'description' => 'Tenda camping untuk 4 orang, tahan air dan mudah dipasang.',
                'donation_price' => 40000,
                'price_unit' => 'per day',
                'stock' => 3,
                'condition' => 'good',
                'category' => 'holiday',
                'location' => 'Bandung',
                'images' => ['/images/tent.jpg'],
            ],
            [
                'name' => 'Stand Mixer',
                'description' => 'Mixer berdiri untuk kebutuhan baking dan memasak skala besar.',
                'donation_price' => 30000,
                'price_unit' => 'per day',
                'stock' => 2,
                'condition' => 'excellent',
                'category' => 'cooking-heating',
                'location' => 'Purwokerto',
                'images' => ['/images/stand-mixer.jpg'],
            ],
            [
                'name' => 'Garden Trimmer',
                'description' => 'Pemangkas tanaman elektrik untuk merapikan taman dan hedge.',
                'donation_price' => 20000,
                'price_unit' => 'per day',
                'stock' => 4,
                'condition' => 'good',
                'category' => 'gardening',
                'location' => 'Jakarta',
                'images' => ['/images/trimmer.jpg'],
            ],
        ];

        foreach ($items as $itemData) {
            $category = Category::where('slug', $itemData['category'])->first();
            $location = Location::where('city', $itemData['location'])->first();

            if ($category && $location) {
                Item::create([
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
                    'images' => $itemData['images'],
                    'usage_instructions' => 'Silakan baca manual penggunaan. Gunakan dengan hati-hati dan kembalikan dalam kondisi bersih.',
                ]);
            }
        }
    }
}
