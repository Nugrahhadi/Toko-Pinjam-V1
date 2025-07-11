<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $isMenuOpen = false;
    public $search = '';

    public function toggleMenu()
    {
        $this->isMenuOpen = !$this->isMenuOpen;
    }

    public function updatedSearch()
    {
        // Emit event ketika search berubah
        $this->dispatch('searchUpdated', $this->search);
    }

    #[On('clearSearchInput')]
    public function clearSearchInput()
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
