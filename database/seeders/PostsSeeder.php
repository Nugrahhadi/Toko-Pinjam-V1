<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Tips Memilih Barang Pinjaman yang Tepat',
                'slug' => 'tips-memilih-barang-pinjaman-yang-tepat',
                'description' => 'Panduan lengkap untuk memilih barang pinjaman sesuai kebutuhan Anda',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'category' => 'Tips',
                'author' => 'Rafiif Bagasakara',
                'author_email' => 'rafiif.bagasakara@tokopinjam.com',
                'author_phone' => '081234567890',
                'status' => 'published',
                'published_at' => now(),
                'views' => 125,
                'likes' => 15,
            ],
            [
                'title' => 'Cara Merawat Barang Pinjaman',
                'slug' => 'cara-merawat-barang-pinjaman',
                'description' => 'Tips dan trik merawat barang pinjaman agar tetap dalam kondisi baik',
                'content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'category' => 'Tutorial',
                'author' => 'Siti Maharani',
                'author_email' => 'siti.maharani@tokopinjam.com',
                'author_phone' => '081234567891',
                'status' => 'published',
                'published_at' => now()->subDays(1),
                'views' => 89,
                'likes' => 12,
            ],
            [
                'title' => 'Keuntungan Sistem Pinjam Meminjam',
                'slug' => 'keuntungan-sistem-pinjam-meminjam',
                'description' => 'Mengenal lebih dekat manfaat sistem sharing economy dalam kehidupan sehari-hari',
                'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                'category' => 'Artikel',
                'author' => 'Ahmad Wijaya',
                'author_email' => 'ahmad.wijaya@tokopinjam.com',
                'author_phone' => '081234567892',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views' => 156,
                'likes' => 23,
            ],
            [
                'title' => 'Event Purwokerto: Grand Opening Toko Pinjam',
                'slug' => 'event-purwokerto-grand-opening-toko-pinjam',
                'description' => 'Laporan lengkap acara grand opening Toko Pinjam Purwokerto',
                'content' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.',
                'category' => 'Event',
                'author' => 'Maya Sari',
                'author_email' => 'maya.sari@tokopinjam.com',
                'author_phone' => '081234567893',
                'status' => 'published',
                'published_at' => now()->subDays(3),
                'views' => 203,
                'likes' => 31,
            ],
            [
                'title' => 'Inovasi Teknologi dalam Sharing Economy',
                'slug' => 'inovasi-teknologi-dalam-sharing-economy',
                'description' => 'Bagaimana teknologi mengubah cara kita berbagi dan meminjam barang',
                'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',
                'category' => 'Teknologi',
                'author' => 'Budi Santoso',
                'author_email' => 'budi.santoso@tokopinjam.com',
                'author_phone' => '081234567894',
                'status' => 'published',
                'published_at' => now()->subDays(4),
                'views' => 167,
                'likes' => 19,
            ],
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
