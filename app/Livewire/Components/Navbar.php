<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $isMenuOpen = false;
    public $search = '';
    public $cartCount = 0;

    public function mount()
    {
        // Initialize cart count from session or database
        $this->cartCount = session('cart_count', 0);
    }

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

    #[On('cartUpdated')]
    public function updateCartCount($count)
    {
        $this->cartCount = $count;
        session(['cart_count' => $count]);
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
