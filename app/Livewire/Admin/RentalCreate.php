<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use App\Models\User;
use App\Models\Rental;

class RentalCreate extends Component
{
    public $user_id;
    public $item_id;
    public $quantity = 1;
    public $start_date;
    public $end_date;
    public $note;
    
    public $available = null;

    // Untuk mengkalkulasi stok secara real-time pada view saat input diubah
    public function updated($propertyName)
    {
        if (in_array($propertyName, ['item_id', 'start_date', 'end_date'])) {
            $this->calculateAvailableStock();
        }
    }

    public function calculateAvailableStock()
    {
        if ($this->item_id && $this->start_date && $this->end_date) {
            $item = Item::find($this->item_id);
            if ($item) {
                $bookedQuantity = Rental::where("item_id", $this->item_id)
                    ->whereIn("status", ["booked", "ongoing"])
                    ->where(function ($query) {
                        // Memeriksa irisan tanggal
                        $query->whereDate("start_date", "<=", $this->end_date)
                              ->whereDate("end_date", ">=", $this->start_date);
                    })
                    ->sum("quantity");
                    
                $this->available = $item->stock - $bookedQuantity;
            }
        } else {
            $this->available = null;
        }
    }

    public function save()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'note' => 'nullable|string',
        ]);

        // Memastikan perhitungan stok ketersediaan dihitung ulang sebelum menyimpan
        $this->calculateAvailableStock();

        if ($this->available !== null && $this->quantity > $this->available) {
            $this->addError('form', "Stok di tanggal tersebut tidak mencukupi. Tersedia: {$this->available}");
            return;
        }

        Rental::create([
            'user_id' => $this->user_id,
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => 'booked',
            'note' => $this->note,
        ]);

        session()->flash('message', 'Pesanan berhasil ditambahkan.');
        return redirect()->route('admin.items');
    }

    public function render()
    {
        return view('livewire.admin.rental-create', [
            'users' => User::orderBy('name')->get(),
            'items' => Item::orderBy('name')->get(),
        ])
        ->extends('layouts.admin')
        ->section('content');
    }
}