<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Admin Toko Pinjam',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'full_name' => 'Administrator Toko Pinjam',
                'birth_date' => '1990-01-01',
                'address' => 'Kantor Pusat Toko Pinjam, Purwokerto',
                'whatsapp_number' => '081234567890',
                'gender' => 'Laki-laki',
                'education_level' => 'S1',
                'university_name' => 'Universitas Terbuka',
                'nim' => 'ADM001',
                'student_id_card' => 'admin-id-card.jpg',
                'organization_origin' => 'Toko Pinjam',
                'email_verified_at' => now(),
            ]);

            // Create sample users
            User::create([
                'name' => 'Rafiif Nur Tahta Bagaskara',
                'email' => 'rafiif@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'full_name' => 'Rafiif Nur Tahta Bagaskara',
                'birth_date' => '2000-05-15',
                'address' => 'Jl. Sudirman No. 123, Purwokerto',
                'whatsapp_number' => '081234567891',
                'gender' => 'Laki-laki',
                'education_level' => 'S1',
                'university_name' => 'Universitas Jenderal Soedirman',
                'nim' => 'H1D020001',
                'student_id_card' => 'student-id-1.jpg',
                'organization_origin' => 'Himpunan Mahasiswa',
                'email_verified_at' => now(),
            ]);

            User::create([
                'name' => 'Allin Alya Yasmin',
                'email' => 'allin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'full_name' => 'Allin Alya Yasmin',
                'birth_date' => '2001-08-20',
                'address' => 'Jl. Ahmad Yani No. 456, Purwokerto',
                'whatsapp_number' => '081234567892',
                'gender' => 'Perempuan',
                'education_level' => 'S1',
                'university_name' => 'Universitas Jenderal Soedirman',
                'nim' => 'H1D020002',
                'student_id_card' => 'student-id-2.jpg',
                'organization_origin' => 'Himpunan Mahasiswa',
                'email_verified_at' => now(),
            ]);
        }
    }
}
