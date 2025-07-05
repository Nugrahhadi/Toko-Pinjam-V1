<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'avatar' => '/images/avatars/sarah.jpg',
                'message' => 'Toko Pinjam sangat membantu saya renovasi rumah tanpa harus beli alat mahal. Pelayanannya ramah dan alat-alatnya berkualitas!',
                'rating' => 5,
                'location' => 'Jakarta',
                'is_featured' => true,
            ],
            [
                'name' => 'Ahmad Rizki',
                'avatar' => '/images/avatars/ahmad.jpg',
                'message' => 'Konsep yang brilliant! Saya bisa pinjam projector untuk presentasi kantor dengan harga donasi yang sangat terjangkau.',
                'rating' => 5,
                'location' => 'Bandung',
                'is_featured' => true,
            ],
            [
                'name' => 'Maria Santos',
                'avatar' => '/images/avatars/maria.jpg',
                'message' => 'Platform yang sangat membantu untuk kebutuhan rumah tangga. Proses booking mudah dan barang selalu dalam kondisi baik.',
                'rating' => 5,
                'location' => 'Surabaya',
                'is_featured' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'avatar' => '/images/avatars/budi.jpg',
                'message' => 'Saya pinjam mesin cuci tekanan tinggi untuk bersih-bersih halaman. Hasilnya memuaskan dan proses pengembalian mudah.',
                'rating' => 4,
                'location' => 'Yogyakarta',
                'is_featured' => true,
            ],
            [
                'name' => 'Linda Chen',
                'avatar' => '/images/avatars/linda.jpg',
                'message' => 'Tim Toko Pinjam sangat profesional. Mereka memberikan instruksi penggunaan yang jelas untuk setiap alat yang dipinjam.',
                'rating' => 5,
                'location' => 'Purwokerto',
                'is_featured' => true,
            ],
            [
                'name' => 'David Wilson',
                'avatar' => '/images/avatars/david.jpg',
                'message' => 'Ide sharing economy yang sangat bagus! Kita bisa akses berbagai alat berkualitas tanpa harus investasi besar.',
                'rating' => 5,
                'location' => 'Jakarta',
                'is_featured' => true,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'avatar' => '/images/avatars/siti.jpg',
                'message' => 'Sangat terbantu untuk kebutuhan event keluarga. Pinjam tenda camping untuk acara outdoor berjalan lancar.',
                'rating' => 4,
                'location' => 'Bandung',
                'is_featured' => true,
            ],
            [
                'name' => 'Robert Kim',
                'avatar' => '/images/avatars/robert.jpg',
                'message' => 'Aplikasi mudah digunakan, customer service responsif, dan koleksi alatnya lengkap. Highly recommended!',
                'rating' => 5,
                'location' => 'Surabaya',
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
