<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class LaporanKeuangan extends Component
{
    public function render()
    {
        return view('livewire.laporan-keuangan');
    }
}
