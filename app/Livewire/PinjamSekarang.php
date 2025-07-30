<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class PinjamSekarang extends Component
{
    use WithPagination;

    public $selectedCategory = 'all';
    public $requestItem = '';
    public $search = ''; // pencarian

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function submitRequest()
    {
        $this->validate([
            'requestItem' => 'required|string|max:255',
        ]);

        $this->requestItem = '';
        session()->flash('message', 'Terima kasih! Barang sudah dicatat.');
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

        // Filter kategori
        if ($this->selectedCategory !== 'all') {
            $allItems = $allItems->filter(fn($item) =>
                $item['category_slug'] === $this->selectedCategory
            );
        }

        // Filter pencarian
        if (!empty($this->search)) {
            $searchTerm = strtolower($this->search);
            $allItems = $allItems->filter(fn($item) =>
                str_contains(strtolower($item['name']), $searchTerm) ||
                str_contains(strtolower($item['description']), $searchTerm)
            );
        }

        // Pagination
        $perPage = 12;
        $currentPage = $this->getPage();
        $items = $allItems->forPage($currentPage, $perPage);

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $allItems->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('livewire.pinjam-sekarang', [
            'items' => $paginator,
            'categories' => $categories,
        ])->layout('layouts.guest');
    }
}
