<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CheapestPrice extends Component
{
    public $items = [
        [
            'name' => 'Buku Atomic Habits',
            'image' => 'BukuAtomichabits.png',
            'price' => '5.000',
            'category' => 'Buku'
        ],
        [
            'name' => 'Buku The Samsung Way',
            'image' => 'BukuTheSamsungWay.png',
            'price' => '5.000',
            'category' => 'Buku'
        ],
        [
            'name' => 'Godox SL60w',
            'image' => 'GodoxSL60w.png',
            'price' => '25.000',
            'category' => 'Lighting'
        ],
        [
            'name' => 'Handy Talky',
            'image' => 'ht.png',
            'price' => '15.000',
            'category' => 'Komunikasi'
        ],
        [
            'name' => 'Mic Takara',
            'image' => 'micTakara.png',
            'price' => '20.000',
            'category' => 'Audio'
        ],
        [
            'name' => 'PlayStation 4',
            'image' => 'ps4.png',
            'price' => '35.000',
            'category' => 'Gaming'
        ],
        [
            'name' => 'Tenda Gazebo',
            'image' => 'tendagazebo.png',
            'price' => '50.000',
            'category' => 'Outdoor'
        ],
        [
            'name' => 'Tripod Jete',
            'image' => 'TripodJete.png',
            'price' => '15.000',
            'category' => 'Fotografi'
        ],
        [
            'name' => 'Tripod Velbon',
            'image' => 'TripodVelbon.png',
            'price' => '20.000',
            'category' => 'Fotografi'
        ]
    ];

    public $showAll = false;

    public function toggleShowAll()
    {
        $this->showAll = !$this->showAll;
    }

    public function getDisplayedItems()
    {
        return $this->showAll ? $this->items : array_slice($this->items, 0, 5);
    }

    public function viewItemDetail($itemName)
    {
        // Logic untuk melihat detail item
        $this->dispatch('item-clicked', ['item' => $itemName]);
    }

    public function render()
    {
        return view('livewire.components.cheapest-price');
    }
}
