<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DonationSetting;
use App\Models\DonationLeaderboard;
use App\Models\DonationTestimonial;

class HalamanDonasi extends Component
{
    public $total_amount = 0;
    public $goal_amount = 1000000;

    public $leaders = []; // top 20 (user + amount)
    public $testimonials = []; // approved testimonials (user + message)

    public function mount(): void
    {
        $s = DonationSetting::first();
        if ($s) {
            $this->total_amount = (float) $s->total_amount;
            $this->goal_amount = (float) $s->goal_amount;
        }

        $this->leaders = DonationLeaderboard::with("user")
            ->orderByRaw("position IS NULL")
            ->orderBy("position")
            ->orderByDesc("amount")
            ->take(20)
            ->get();

        $this->testimonials = DonationTestimonial::with("user")
            ->where("approved", true)
            ->orderByRaw("position IS NULL")
            ->orderBy("position")
            ->latest("id")
            ->get();
    }

    public function render()
    {
        return view("livewire.halaman-donasi", [
            "total_amount" => $this->total_amount,
            "goal_amount" => $this->goal_amount,
            "leaders" => $this->leaders,
            "testimonials" => $this->testimonials,
        ]);
    }
}
