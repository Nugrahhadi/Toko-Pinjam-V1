<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\MediaPartner;

class MediaPartnerSection extends Component
{
    public $partners;

    public function mount()
    {
        // Ambil data menggunakan scope active dari Model
        $this->partners = MediaPartner::active()->get();
    }

    public function render()
    {
        return view('livewire.components.media-partner-section');
    }
}