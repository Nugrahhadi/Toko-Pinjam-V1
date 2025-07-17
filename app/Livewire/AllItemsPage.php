<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class AllItemsPage extends Component
{
    use WithPagination;

    public $selectedCategory = 'all';

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function render()
    {
        $categories = collect([
            (object)['name' => 'Elektronik', 'slug' => 'elektronik'],
            (object)['name' => 'Olahraga', 'slug' => 'olahraga'],
            (object)['name' => 'Buku', 'slug' => 'buku'],
            (object)['name' => 'Alat Musik', 'slug' => 'alat-musik'],
        ]);

        $allItems = collect([
            [
                'id' => 1,
                'name' => 'PlayStation 4 Pro',
                'description' => 'Konsol gaming terbaik untuk pengalaman bermain yang luar biasa dengan grafis 4K.',
                'price' => 75000,
                'category' => 'Elektronik',
                'category_slug' => 'elektronik',
                'image' => 'ps4.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 2,
                'name' => 'Godox SL60W',
                'description' => 'LED video light profesional dengan output 60W untuk fotografi dan videografi.',
                'price' => 45000,
                'category' => 'Elektronik',
                'category_slug' => 'elektronik',
                'image' => 'GodoxSL60w.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 3,
                'name' => 'Tripod Velbon',
                'description' => 'Tripod berkualitas tinggi untuk kamera DSLR dan mirrorless dengan stabilitas maksimal.',
                'price' => 25000,
                'category' => 'Elektronik',
                'category_slug' => 'elektronik',
                'image' => 'TripodVelbon.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 4,
                'name' => 'Tripod Jete',
                'description' => 'Tripod ringan dan portable untuk traveling dan outdoor photography.',
                'price' => 20000,
                'category' => 'Elektronik',
                'category_slug' => 'elektronik',
                'image' => 'TripodJete.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 5,
                'name' => 'Tenda Gazebo',
                'description' => 'Tenda gazebo untuk acara outdoor, camping, atau event dengan kapasitas besar.',
                'price' => 100000,
                'category' => 'Olahraga',
                'category_slug' => 'olahraga',
                'image' => 'tendagazebo.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 6,
                'name' => 'Microphone Takara',
                'description' => 'Mikrofon berkualitas untuk recording, podcast, atau streaming dengan suara jernih.',
                'price' => 30000,
                'category' => 'Alat Musik',
                'category_slug' => 'alat-musik',
                'image' => 'micTakara.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 7,
                'name' => 'Handy Talky',
                'description' => 'Alat komunikasi jarak jauh untuk keperluan outdoor, event, atau koordinasi tim.',
                'price' => 35000,
                'category' => 'Elektronik',
                'category_slug' => 'elektronik',
                'image' => 'ht.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 8,
                'name' => 'Atomic Habits',
                'description' => 'Buku bestseller tentang cara membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
                'price' => 15000,
                'category' => 'Buku',
                'category_slug' => 'buku',
                'image' => 'BukuAtomichabits.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
            [
                'id' => 9,
                'name' => 'The Samsung Way',
                'description' => 'Buku tentang strategi bisnis dan inovasi dari perusahaan teknologi Samsung.',
                'price' => 12000,
                'category' => 'Buku',
                'category_slug' => 'buku',
                'image' => 'BukuTheSamsungWay.png',
                'location' => 'Purwokerto',
                'available' => true,
            ],
        ]);

        // Filter items based on selected category
        if ($this->selectedCategory !== 'all') {
            $allItems = $allItems->filter(function ($item) {
                return $item['category_slug'] === $this->selectedCategory;
            });
        }

        // Paginate items (simulated pagination)
        $perPage = 12;
        $currentPage = $this->getPage();
        $items = $allItems->forPage($currentPage, $perPage);

        // Create a simple paginator
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $allItems->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('livewire.all-items-page', [
            'items' => $paginator,
            'categories' => $categories,
        ])->layout('layouts.guest');
    }
}
