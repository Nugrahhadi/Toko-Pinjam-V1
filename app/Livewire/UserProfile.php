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
    public $stats = ['savings' => 0, 'environment' => 0, 'shared' => 0];

    public function mount()
    {
        $this->user = Auth::user();

        // (opsional) kalau belum login, lempar ke halaman login custom kamu
        if (!$this->user) {
            return redirect()->route('login.custom');
        }

        // ambil beberapa riwayat peminjaman terbaru milik user ini
        $this->rentals = Rental::with('item')
            ->where('user_id', $this->user->id)
            ->latest('start_date')
            ->take(5)
            ->get();

        // hitung angka "dampak" sederhana (silakan sesuaikan logika)
        $totalDays = $this->rentals->sum(function ($r) {
            $days = Carbon::parse($r->start_date)->diffInDays(Carbon::parse($r->end_date));
            return $days > 0 ? $days : 1;
        });

        $this->stats['shared']      = (int) $this->rentals->unique('item_id')->count();
        $this->stats['environment'] = (int) $totalDays;        // contoh: 1 kg/hari
        $this->stats['savings']     = (int) ($totalDays * 20000); // contoh: Rp20k/hari
    }

    public function render()
    {
        return view('livewire.user-profile', [
            'user'    => $this->user,
            'rentals' => $this->rentals,
            'stats'   => $this->stats,
        ]);
    }
}
