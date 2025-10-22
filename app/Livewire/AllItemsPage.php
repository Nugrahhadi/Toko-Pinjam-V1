<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AllItemsPage extends Component
{
    use WithPagination;

    public $selectedCategory = 'all';
    public $search = '';
    public $categories;

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get(['id','name','slug']);
    }

    public function filterByCategory($slug)
    {
        $this->selectedCategory = $slug;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $items = Item::with(['category:id,name,slug', 'location:id,name'])
            ->where('is_active', true)
            ->when($this->search, function ($q) {
                $q->where(function($qq) {
                    $qq->where('name', 'like', '%' . $this->search . '%')
                       ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedCategory !== 'all', function ($q) {
                $q->whereHas('category', fn($qq) => $qq->where('slug', $this->selectedCategory));
            })
            ->latest()        // urutkan dari yang terbaru
            ->paginate(20);    // ubah dari 12 menjadi 20 untuk 5 kolom (4 baris x 5)

        return view('livewire.all-items-page', [
            'items' => $items,
            'categories' => $this->categories,
        ]);
    }
}
