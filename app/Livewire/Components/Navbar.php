<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public bool $isMenuOpen = false;     // toggle mobile menu
    public bool $profileOpen = false;    // toggle dropdown profil (tanpa Alpine)
    public string $search = '';

    /** Toggle mobile menu */
    public function toggleMenu(): void
    {
        $this->isMenuOpen = ! $this->isMenuOpen;
    }

    /** Toggle dropdown profil (desktop) */
    public function toggleProfile(): void
    {
        $this->profileOpen = ! $this->profileOpen;
    }

    /** Tutup dropdown profil saat area luar diklik (opsional, bisa dipanggil dari link) */
    public function closeProfile(): void
    {
        $this->profileOpen = false;
    }

    /** Livewire v3: dipanggil saat search berubah */
    public function updatedSearch(): void
    {
        // Emit event ketika search berubah
        $this->dispatch('searchUpdated', $this->search);
    }

    #[On('clearSearchInput')]
    public function clearSearchInput(): void
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
