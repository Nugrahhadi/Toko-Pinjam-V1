<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Item;

class Dashboard extends Component
{
    public $totalMembers;
    public $totalItems;
    public $totalBlogs;
    public $totalLocations = 1; // Manual for now (Purwokerto)

    public function mount()
    {
        $this->totalMembers = User::where('role', 'user')->count();
        $this->totalItems = Item::count();
        $this->totalBlogs = Post::where('status', 'published')->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
