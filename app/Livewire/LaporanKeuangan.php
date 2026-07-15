<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\DonationAllocation;
use App\Models\FinancialReport;

#[Layout('layouts.guest')]
class LaporanKeuangan extends Component
{
    public function render()
    {
        $allocation = DonationAllocation::first() ?? new DonationAllocation([
            'operational' => 0,
            'buy_goods' => 0,
            'event' => 0,
            'promotion' => 0,
            'maintenance' => 0,
            'others' => 0,
        ]);

        $reports = FinancialReport::all();

        return view('livewire.laporan-keuangan', [
            'allocation' => $allocation,
            'reports' => $reports,
        ]);
    }
}
