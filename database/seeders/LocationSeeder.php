<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Toko Pinjam Purwokerto',
                'city' => 'Purwokerto',
                'province' => 'Jawa Tengah',
                'country' => 'Indonesia',
                'address' => 'Jl. Jenderal Sudirman No. 123',
                'postal_code' => '53111',
                'latitude' => -7.4286,
                'longitude' => 109.2369,
            ],
            [
                'name' => 'Toko Pinjam Jakarta',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'country' => 'Indonesia',
                'address' => 'Jl. MH Thamrin No. 456',
                'postal_code' => '10240',
                'latitude' => -6.2088,
                'longitude' => 106.8456,
            ],
            [
                'name' => 'Toko Pinjam Bandung',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'country' => 'Indonesia',
                'address' => 'Jl. Asia Afrika No. 789',
                'postal_code' => '40111',
                'latitude' => -6.9175,
                'longitude' => 107.6191,
            ],
            [
                'name' => 'Toko Pinjam Surabaya',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'country' => 'Indonesia',
                'address' => 'Jl. Pemuda No. 321',
                'postal_code' => '60271',
                'latitude' => -7.2575,
                'longitude' => 112.7521,
            ],
            [
                'name' => 'Toko Pinjam Yogyakarta',
                'city' => 'Yogyakarta',
                'province' => 'DI Yogyakarta',
                'country' => 'Indonesia',
                'address' => 'Jl. Malioboro No. 654',
                'postal_code' => '55271',
                'latitude' => -7.7956,
                'longitude' => 110.3695,
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
