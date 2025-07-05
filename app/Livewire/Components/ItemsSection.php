<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Item;
use App\Models\Category;
use Livewire\Attributes\On;

class ItemsSection extends Component
{
    public $selectedLocation = '';
    public $searchTerm = '';
    public $items;
    public $categories;
    public $featuredItems;

    public function mount()
    {
        $this->categories = Category::active()->get();
        $this->loadItems();
    }

    #[On('locationChanged')]
    public function locationChanged($locationId)
    {
        $this->selectedLocation = $locationId;
        $this->loadItems();
    }

    #[On('searchUpdated')]
    public function searchUpdated($searchTerm)
    {
        $this->searchTerm = $searchTerm;
        $this->loadItems();
    }

    public function clearSearch()
    {
        $this->searchTerm = '';
        $this->loadItems();
        // Notify navbar to clear search input
        $this->dispatch('clearSearchInput');
    }

    public function loadItems()
    {
        $query = Item::with(['category', 'location'])->active();

        if ($this->selectedLocation) {
            $query->where('location_id', $this->selectedLocation);
        }

        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhereHas('category', function ($categoryQuery) {
                        $categoryQuery->where('name', 'like', '%' . $this->searchTerm . '%');
                    });
            });
        }

        $this->items = $query->take($this->searchTerm ? 12 : 8)->get();
        $this->featuredItems = Item::with(['category', 'location'])
            ->active()
            ->featured()
            ->when($this->selectedLocation, function ($q) {
                $q->where('location_id', $this->selectedLocation);
            })
            ->when($this->searchTerm, function ($q) {
                $q->where(function ($subQ) {
                    $subQ->where('name', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                        ->orWhereHas('category', function ($categoryQuery) {
                            $categoryQuery->where('name', 'like', '%' . $this->searchTerm . '%');
                        });
                });
            })
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.components.items-section');
    }
}
