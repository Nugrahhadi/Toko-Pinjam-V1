<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\OurPartner;

class OurPartnerSection extends Component
{
    // Diinisialisasi sebagai array kosong agar tidak terjadi "Undefined variable" di view
    public $partners = []; 

    public function mount()
    {
        // Mengambil data OurPartner yang aktif dan terurut
        $this->partners = OurPartner::active()->get(); 
    }

    public function render()
    {
        return view('livewire.components.our-partner-section');
    }
}