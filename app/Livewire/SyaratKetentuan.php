<?php

namespace App\Livewire;

use Livewire\Component;

class SyaratKetentuan extends Component
{
    public function render()
    {
        return view('livewire.syarat-ketentuan')->layout('layouts.guest');
    }
}
