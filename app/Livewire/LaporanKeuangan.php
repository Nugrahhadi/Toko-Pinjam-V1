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
            'item_procurement' => 0,
            'website_operations' => 0,
            'creative_work' => 0,
            'digital_subscriptions' => 0,
            'others' => 0,
        ]);

        $reports = FinancialReport::all();

        return view('livewire.laporan-keuangan', [
            'allocation' => $allocation,
            'reports' => $reports,
        ]);
    }
}
