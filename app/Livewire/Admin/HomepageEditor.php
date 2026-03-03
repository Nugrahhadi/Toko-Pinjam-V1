<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MediaPartner;
use App\Models\OurPartner; // Import Model OurPartner
use Livewire\Attributes\Title;

#[Title('Editor Beranda')]
class HomepageEditor extends Component
{
    // Properti data untuk ringkasan
    public $totalMediaPartners; // Diubah namanya agar lebih spesifik
    public $totalOurPartners;   // Properti baru
    public $activeTab = 'hero'; 

    public function mount()
    {
        // Mendapatkan jumlah partner media lama
        $this->totalMediaPartners = MediaPartner::count();
        // Mendapatkan jumlah partner baru
        $this->totalOurPartners = OurPartner::count(); 
    }

    public function render()
    {
        return view('livewire.admin.homepage-editor', [
            'totalMediaPartners' => $this->totalMediaPartners,
            'totalOurPartners' => $this->totalOurPartners, // Kirim data baru ke view
        ])
            ->extends('layouts.admin') 
            ->section('content');
    }
}