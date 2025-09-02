<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\DonationSetting;
use App\Models\DonationLeaderboard;
use App\Models\DonationTestimonial;

class DonationPageEditor extends Component
{
    use WithPagination;

    // Settings
    public $total_amount;
    public $goal_amount;

    protected $rules = [
        "total_amount" => ["required", "numeric", "min:0"],
        "goal_amount" => ["required", "numeric", "min:0"],
    ];

    public function mount(): void
    {
        $setting =
            DonationSetting::first() ??
            DonationSetting::create([
                "total_amount" => 0,
                "goal_amount" => 1000000,
            ]);

        $this->total_amount = $setting->total_amount;
        $this->goal_amount = $setting->goal_amount;
    }

    public function saveSettings(): void
    {
        $this->validate();
        DonationSetting::query()
            ->first()
            ->update([
                "total_amount" => $this->total_amount,
                "goal_amount" => $this->goal_amount,
            ]);
        session()->flash("message", "Pengaturan donasi disimpan.");
    }

    /** Data providers (ringkas) */
    public function getTop3Property()
    {
        return DonationLeaderboard::with("user")
            ->orderByRaw("position IS NULL")
            ->orderBy("position")
            ->orderByDesc("amount")
            ->take(3)
            ->get();
    }

    public function getLatest5TestimonialsProperty()
    {
        return DonationTestimonial::with("user")
            ->where("approved", true)
            ->latest("id")
            ->take(5)
            ->get();
    }

    public function render()
    {
        $setting = DonationSetting::first();

        return view("livewire.admin.donation-page-editor", [
            "setting" => $setting,
            "top3" => $this->top3,
            "latest5" => $this->latest5Testimonials,
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}
