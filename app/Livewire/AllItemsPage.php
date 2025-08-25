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

    public function render()
    {
        $items = Item::with(['category:id,name,slug', 'location:id,name'])
            ->where('is_active', true)
            ->when($this->selectedCategory !== 'all', function ($q) {
                $q->whereHas('category', fn($qq) => $qq->where('slug', $this->selectedCategory));
            })
            ->latest()        // urutkan dari yang terbaru
            ->paginate(12);

        return view('livewire.all-items-page', [
            'items' => $items,
            'categories' => $this->categories,
        ]);
    }
}
