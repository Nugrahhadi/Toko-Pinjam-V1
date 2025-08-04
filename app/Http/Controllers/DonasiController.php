// app/Http/Controllers/DonasiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function show()
    {
        return view('donasi', [
            'totalDonasi' => 62500000,
            'leaderboard' => [
                ['nama' => 'Budi Santoso', 'jumlah' => 25000000],
                ['nama' => 'Siti Aminah', 'jumlah' => 20000000],
                ['nama' => 'Agus Wijaya', 'jumlah' => 17500000],
            ],
            'testimoni' => [
                ['nama' => 'Rina', 'pesan' => 'Bantuannya sangat membantu kami di desa. Terima kasih!'],
                ['nama' => 'Dewi', 'pesan' => 'Transparan dan amanah, donasi saya tersampaikan dengan baik.'],
            ],
            'chapterKota' => [
                ['nama' => 'Bandung', 'jumlah_anggota' => 125],
                ['nama' => 'Yogyakarta', 'jumlah_anggota' => 80],
                ['nama' => 'Surabaya', 'jumlah_anggota' => 95],
            ]
        ]);
    }
}
