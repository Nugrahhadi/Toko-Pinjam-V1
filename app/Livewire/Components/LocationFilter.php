<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Location;

class LocationFilter extends Component
{
    public $selectedLocation = '';
    public $locations;

    public function mount()
    {
        $this->locations = Location::active()->get();
    }

    public function updatedSelectedLocation()
    {
        $this->dispatch('locationChanged', $this->selectedLocation);
    }

    public function render()
    {
        return view('livewire.components.location-filter');
    }
}
