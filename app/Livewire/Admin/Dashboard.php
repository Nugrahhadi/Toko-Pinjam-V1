<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Item;
use App\Models\DonationSetting;

class Dashboard extends Component
{
    public $totalMembers;
    public $totalItems;
    public $totalBlogs;
    public $totalLocations = 1; // Manual for now (Purwokerto)

    // NEW
    public $totalDonations = 0;
    public $donationGoal = 0;

    public function mount()
    {
        $this->totalMembers = User::where("role", "user")->count();
        $this->totalItems = Item::count();
        $this->totalBlogs = Post::where("status", "published")->count();

        // NEW: ambil total donasi & goal dari DonationSetting
        $setting = DonationSetting::first();
        $this->totalDonations = (float) ($setting->total_amount ?? 0);
        $this->donationGoal = (float) ($setting->goal_amount ?? 0);
    }

    public function render()
    {
        return view("livewire.admin.dashboard");
    }
}
