<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use Carbon\Carbon;

class UserProfile extends Component
{
    public $user;
    public $rentals;
    public $stats = ["savings" => 0, "environment" => 0, "shared" => 0];

    public function mount()
    {
        $this->user = Auth::user();

        if (!$this->user) {
            return redirect()->route("login.custom");
        }

        // Tabel: tampilkan 5 riwayat terbaru saja
        $this->rentals = \App\Models\Rental::with("item")
            ->where("user_id", $this->user->id)
            ->latest("start_date")
            ->take(5)
            ->get();

        // === Hitung dampak berdasarkan TOTAL SEMUA riwayat user ===
        $allRentals = \App\Models\Rental::with("item")
            ->where("user_id", $this->user->id)
            ->get();

        $totalQty = $allRentals->sum(function ($r) {
            return max(1, (int) ($r->quantity ?? 1));
        });

        // Uang dihemat: pakai harga asli item × qty
        $savings = $allRentals->sum(function ($r) {
            $qty = max(1, (int) ($r->quantity ?? 1));
            $orig = (float) ($r->item->original_price ?? 0);
            return $orig * $qty;
        });

        // Menjaga lingkungan (kg): pakai berat item × qty (boleh desimal)
        $environmentKg = $allRentals->sum(function ($r) {
            $qty = max(1, (int) ($r->quantity ?? 1));
            $weight = (float) ($r->item->weight ?? 0); // kg
            return $weight * $qty;
        });

        // Berbagi bersama: total unit yang dipinjam
        $this->stats = [
            "savings" => (float) $savings,
            "environment" => (float) $environmentKg,
            "shared" => (int) $totalQty,
        ];
    }

    public function render()
    {
        return view("livewire.user-profile", [
            "user" => $this->user,
            "rentals" => $this->rentals,
            "stats" => $this->stats,
        ]);
    }
}
