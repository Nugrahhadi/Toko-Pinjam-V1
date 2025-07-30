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

    public function getDisplayedItems()
    {
        return [
            [
                'name' => 'Sepatu Formal Pria',
                'price' => '15.000',
                'category' => 'Fashion',
                'image' => 'sepatu-formal-pria.jpg'
            ],
            [
                'name' => 'Tas Laptop Premium',
                'price' => '20.000',
                'category' => 'Aksesoris',
                'image' => 'tas-laptop.jpg'
            ],
            [
                'name' => 'Kamera DSLR Canon',
                'price' => '50.000',
                'category' => 'Elektronik',
                'image' => 'kamera-dslr.jpg'
            ],
            [
                'name' => 'Tripod Professional',
                'price' => '25.000',
                'category' => 'Fotografi',
                'image' => 'tripod.jpg'
            ],
            [
                'name' => 'Blazer Formal Wanita',
                'price' => '30.000',
                'category' => 'Fashion',
                'image' => 'blazer-wanita.jpg'
            ],
            [
                'name' => 'Proyektor Mini',
                'price' => '40.000',
                'category' => 'Elektronik',
                'image' => 'proyektor.jpg'
            ],
            [
                'name' => 'Dress Cocktail',
                'price' => '25.000',
                'category' => 'Fashion',
                'image' => 'dress-cocktail.jpg'
            ],
            [
                'name' => 'Alat Camping Set',
                'price' => '35.000',
                'category' => 'Outdoor',
                'image' => 'camping-set.jpg'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.chapter-purwokerto')
            ->title('Toko Pinjam Chapter Purwokerto');
    }
}
