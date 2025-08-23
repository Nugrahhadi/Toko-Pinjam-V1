<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ArcgisMap extends Component
{
    public $mapId;
    public $title;
    public $description;

    public function mount($mapId = 'environmental-justice-map', $title = 'Environmental Justice Cases', $description = 'Kasus-kasus ketidakadilan lingkungan di Indonesia')
    {
        $this->mapId = $mapId;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('livewire.components.arcgis-map');
    }
}
