<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Rental;
use Carbon\Carbon;

class ItemDetailPage extends Component
{
    public Item $item;

    /** Rentang tanggal yang di-disable di kalender */
    public array $bookedRanges = [];

    public function mount(string $slug): void
    {
        $this->item = Item::with(['category:id,name', 'location:id,name'])
            ->where('slug', $slug)
            ->firstOrFail();

        $today = Carbon::today();

        $this->bookedRanges = Rental::where('item_id', $this->item->id)
            ->whereIn('status', ['booked','ongoing'])
            ->whereDate('end_date', '>=', $today)
            ->get(['start_date','end_date'])
            ->map(fn ($r) => [
                'from' => Carbon::parse($r->start_date)->toDateString(),
                'to'   => Carbon::parse($r->end_date)->toDateString(),
            ])
            ->values()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.item-detail-page');
    }
}
