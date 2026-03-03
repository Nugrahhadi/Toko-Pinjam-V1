<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use App\Models\Rental;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RentalCreate extends Component
{
    public $item_id = null;
    public $user_id = null;
    public $quantity = 1;
    public $start_date;
    public $end_date;
    public $note = '';

    public $items = [];
    public $users = []; 
    public $available = null; // <— untuk ditampilkan di view

    public function mount(): void
    {
        $today = Carbon::today();
        $this->start_date = $today->toDateString();
        // Ubah default end_date agar sama dengan start_date (memungkinkan peminjaman 1 hari)
        $this->end_date   = $this->start_date; 

        // Ambil semua item (stok saat ini sudah merefleksikan booking sebelumnya)
        $this->items = Item::orderBy('name')->get(['id','name','stock']);
        $this->users = User::orderBy('name')->get(['id','name','email']);
    }

    /** Recompute ketersediaan berdasarkan stok saat ini */
    protected function recomputeAvailable(): void
    {
        $this->available = null;
        if ($this->item_id) {
            $item = Item::find($this->item_id);
            $this->available = $item?->stock ?? null;
        }
    }

    // Trigger hitung saat user ganti pilihan/tanggal
    public function updatedItemId(){ $this->recomputeAvailable(); }
    public function updatedStartDate(){ $this->recomputeAvailable(); }
    public function updatedEndDate(){ $this->recomputeAvailable(); }
    
    /** Metode baru untuk set peminjaman 1 hari penuh */
    public function setOneDay()
    {
        $today = Carbon::today();
        $this->start_date = $today->toDateString();
        $this->end_date = $this->start_date; // Selesai sama dengan Mulai (1 hari)
        $this->recomputeAvailable();
    }

    public function save()
    {
        try {
            $this->validate([
                'item_id'    => ['required', Rule::exists('items','id')],
                'user_id'    => ['required', Rule::exists('users','id')],
                'quantity'   => ['required','integer','min:1'],
                'start_date' => ['required','date'],
                // PERUBAHAN: Mengizinkan end_date sama dengan start_date untuk 1 hari
                'end_date'   => ['required','date', 'after_or_equal:start_date'],
                'note'       => ['nullable','string'],
            ]);

            DB::transaction(function () {
                // Lock baris item agar stok akurat
                $item = Item::where('id', $this->item_id)->lockForUpdate()->firstOrFail();

                if ($item->stock < (int)$this->quantity) {
                    throw new \RuntimeException("Stok tidak cukup. Tersedia: {$item->stock}");
                }

                // Kurangi stok saat BOOKED
                $item->decrement('stock', (int)$this->quantity);

                // Buat rental berstatus booked
                Rental::create([
                    'item_id'    => $item->id,
                    'user_id'    => $this->user_id,
                    'quantity'   => (int)$this->quantity,
                    'start_date' => $this->start_date,
                    'end_date'   => $this->end_date,
                    'status'     => 'booked',
                    'note'       => $this->note,
                ]);
            });

            // Perbarui info available di UI setelah sukses
            $this->recomputeAvailable();

            session()->flash('message', 'Pesanan berhasil dibuat.');
            return $this->redirect(route('admin.items'), navigate: true);

        } catch (\RuntimeException $e) {
            $this->addError('quantity', $e->getMessage());
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            $this->addError('form', 'Terjadi kesalahan saat menyimpan pesanan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.rental-create')
            ->extends('layouts.admin')
            ->section('content');
    }
}