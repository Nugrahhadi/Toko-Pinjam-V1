<?php

namespace App\Livewire;

use Livewire\Component;

class FaqPage extends Component
{
    public $openItems = [];

    public function toggleItem($index)
    {
        if (isset($this->openItems[$index])) {
            unset($this->openItems[$index]);
        } else {
            $this->openItems[$index] = true;
        }
    }

    public function render()
    {
        $faqs = [
            [
                'question' => 'Saya belum jadi mahasiswa, apa boleh meminjam?',
                'answer' => 'Sayang sekali saat ini layanan kami hanya tersedia untuk mahasiswa. Akan tetapi, kami terus mengupayakan berbagai persiapan yang diperlukan sehingga Toko Pinjam bisa diakses untuk lebih banyak orang.'
            ],
            [
                'question' => 'Apakah ada promo menarik yang membuat saya semakin hemat?',
                'answer' => 'Akan selalu ada, itu janji kami. Cek beranda taman ini untuk tahu promo apa yang sedang berlaku. Kami percaya kamu akan senang ketika kamu semakin hemat.'
            ],
            [
                'question' => 'Apakah saya harus membuat akun untuk meminjam?',
                'answer' => 'Betul sekali! Pembuatan akun tidak dipungut biaya dan hanya memakan waktu kurang dari lima menit! Ayo daftar sekarang.'
            ],
            [
                'question' => 'Apakah diperlukan jaminan ketika meminjam?',
                'answer' => 'Tepat. Siapkan KTP atau SIM untuk ditunjukkan kepada kami ketika mengambil barang pinjaman. Tenang saja, dokumen akan aman bersama kami dan diberikan kembali saat kamu mengembalikan barang.'
            ],
            [
                'question' => 'Apakah saya diharuskan berdonasi saat meminjam?',
                'answer' => 'Benar. Setiap barang memiliki nilai donasi minimal yang berbeda, pastikan cek nilainya. Jika kamu merasa layanan kami membantu dan ingin membantu balik kami, silahkan berdonasi dengan nilai minimal ya! Donasi kamu akan ya membantu layanan ini akan tetap ada.'
            ],
            [
                'question' => 'Apakah layanan Toko Pinjam hanya tersedia di Purwokerto?',
                'answer' => 'Saat ini, ya. Namun, perencanaan untuk memperluas layanan ke daerah lain adalah di pikiran kami setiap sebelum tidur. Nantikan kami di daerahmu.'
            ]
        ];

        return view('livewire.faq-page', [
            'faqs' => $faqs
        ])->layout('layouts.guest');
    }
}