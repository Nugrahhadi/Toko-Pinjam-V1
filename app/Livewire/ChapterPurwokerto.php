<?php

namespace App\Livewire;

use Livewire\Component;

class ChapterPurwokerto extends Component
{
    public $activeTab = 'lokasi';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.chapter-purwokerto');
    }
}
