<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;
use App\Models\Rental;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ItemManagement extends Component
{
    use WithPagination;

    /** Listing & query state **/
    public $filter = "all";
    public $search = "";
    public $sortBy = "created_at";
    public $sortDirection = "desc";

    /** Delete item modal **/
    public $showDeleteModal = false;
    public $deleteItemId = null;

    /** Edit booking (BOOKED) modal **/
    public $showEditModal = false;
    public $editRentalId = null;
    public $edit_item_id = null;
    public $edit_quantity = 1;
    public $edit_start_date;
    public $edit_end_date;
    public $edit_note = "";

    /** Create booking (link ke halaman create, tapi properti disiapkan jika mau dipakai modal) */
    public $bookableItems = [];

    protected $queryString = [
        "filter" => ["except" => "all"],
        "search" => ["except" => ""],
        "page" => ["except" => 1],
        "sortBy" => ["except" => "created_at"],
        "sortDirection" => ["except" => "desc"],
    ];

    public function mount(): void
    {
        $this->autoTransitionBookings();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection =
                $this->sortDirection === "asc" ? "desc" : "asc";
        } else {
            $this->sortBy = $field;
            $this->sortDirection = "asc";
        }
        $this->resetPage();
    }

    /** ---------------- RENTAL LOGIC ---------------- **/

    protected function autoTransitionBookings(): void
    {
        $today = Carbon::today();

        // 1. Transisi ke Ongoing (Sedang Dipinjam) untuk pesanan yang masih relevan
        Rental::where("status", "booked")
            ->whereDate("start_date", "<=", $today)
            ->whereDate("end_date", ">=", $today)
            ->update(["status" => "ongoing"]);

        // 2. Transisi ke Returned (Otomatis Selesai) untuk pesanan yang sudah melewati tanggal selesai
        Rental::whereIn("status", ["booked", "ongoing"])
            ->whereDate("end_date", "<", $today)
            ->update(["status" => "returned", "returned_at" => now()]);
    }

    public function markReturned(int $rentalId): void
    {
        $rental = Rental::with("item")->findOrFail($rentalId);
        if ($rental->status !== "ongoing") {
            session()->flash(
                "message",
                'Hanya status "sedang dipinjam" yang bisa dikembalikan.',
            );
            return;
        }

        // Hanya memperbarui status, tanpa memanipulasi $item->stock
        $rental->update(["status" => "returned", "returned_at" => now()]);

        session()->flash(
            "message",
            "Barang ditandai sudah kembali.",
        );
    }

    // Fungsi bantuan untuk menghitung ketersediaan stok berdasarkan rentang tanggal
    private function checkAvailableStock($itemId, $startDate, $endDate, $ignoreRentalId = null)
    {
        $item = Item::findOrFail($itemId);
        
        $bookedQuantity = Rental::where("item_id", $itemId)
            ->whereIn("status", ["booked", "ongoing"])
            ->where(function ($query) use ($startDate, $endDate) {
                // Rentang waktu beririsan
                $query->whereDate("start_date", "<=", $endDate)
                      ->whereDate("end_date", ">=", $startDate);
            })
            ->when($ignoreRentalId, function ($query, $ignoreRentalId) {
                return $query->where("id", "!=", $ignoreRentalId);
            })
            ->sum("quantity");

        return $item->stock - $bookedQuantity;
    }

    public function openEditModal(int $rentalId): void
    {
        $r = Rental::with("item")->findOrFail($rentalId);
        if ($r->status !== "booked") {
            session()->flash(
                "message",
                'Hanya pesanan berstatus "Booked" yang bisa diedit.',
            );
            return;
        }

        $this->resetValidation();

        $this->editRentalId = $r->id;
        $this->edit_item_id = $r->item_id;
        $this->edit_quantity = $r->quantity;
        $this->edit_start_date = $r->start_date;
        $this->edit_end_date = $r->end_date;
        $this->edit_note = $r->note;

        $this->showEditModal = true;
    }

    public function updateBooking(): void
    {
        $this->validate([
            "edit_item_id" => ["required", Rule::exists("items", "id")],
            "edit_quantity" => ["required", "integer", "min:1"],
            "edit_start_date" => ["required", "date"],
            "edit_end_date" => ["required", "date", "after_or_equal:edit_start_date"],
            "edit_note" => ["nullable", "string"],
        ]);

        $r = Rental::findOrFail($this->editRentalId);
        if ($r->status !== "booked") {
            $this->addError(
                "form",
                'Pesanan tidak bisa diedit karena tidak berstatus "Booked".',
            );
            return;
        }

        // Cek ketersediaan berdasarkan irisan tanggal
        $available = $this->checkAvailableStock(
            $this->edit_item_id, 
            $this->edit_start_date, 
            $this->edit_end_date, 
            $r->id
        );

        if ($this->edit_quantity > $available) {
            $this->addError("form", "Stok pada tanggal tersebut tidak cukup. Tersedia: {$available}");
            return;
        }

        $r->update([
            "item_id" => $this->edit_item_id,
            "quantity" => $this->edit_quantity,
            "start_date" => $this->edit_start_date,
            "end_date" => $this->edit_end_date,
            "note" => $this->edit_note,
        ]);

        $this->showEditModal = false;
        session()->flash("message", "Pesanan berhasil diperbarui.");
    }

    public function deleteBooking(int $rentalId): void
    {
        $r = Rental::findOrFail($rentalId);
        if ($r->status !== "booked") {
            session()->flash(
                "message",
                'Hanya pesanan berstatus "Booked" yang bisa dihapus.',
            );
            return;
        }

        // Dihapus tanpa memanipulasi $item->stock
        $r->delete();

        session()->flash("message", "Pesanan berhasil dihapus.");
    }

    public function confirmDelete($id)
    {
        $this->deleteItemId = $id;
        $this->showDeleteModal = true;
    }
    
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->deleteItemId = null;
    }

    public function deleteItem()
    {
        if (!$this->deleteItemId) {
            return;
        }

        $item = Item::withCount('rentals')->findOrFail($this->deleteItemId);
        $itemName = $item->name;

        if ($item->rentals_count > 0) {
            $this->cancelDelete();
            session()->flash(
                'message',
                "Tidak bisa menghapus '{$itemName}' karena sudah/ pernah dipakai di pesanan. " .
                "Nonaktifkan saja item ini, atau hapus pesanan terkait terlebih dahulu."
            );
            return;
        }

        try {
            DB::transaction(function () use ($item) {
                $images = (array) ($item->images ?? []);
                foreach ($images as $path) {
                    if (is_string($path) && Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }

                if (isset($item->image_path) && is_string($item->image_path)) {
                    if (Storage::disk('public')->exists($item->image_path)) {
                        Storage::disk('public')->delete($item->image_path);
                    }
                }

                if (isset($item->gallery_images)) {
                    $gallery = json_decode($item->gallery_images, true);
                    if (is_array($gallery)) {
                        foreach ($gallery as $p) {
                            if (is_string($p) && Storage::disk('public')->exists($p)) {
                                Storage::disk('public')->delete($p);
                            }
                        }
                    }
                }

                $item->delete();
            });

            $this->cancelDelete();
            session()->flash('message', "Barang '{$itemName}' berhasil dihapus beserta semua file gambarnya.");
        } catch (QueryException $e) {
            $this->cancelDelete();
            session()->flash(
                'message',
                "Gagal menghapus '{$itemName}'. Masih ada data yang bergantung (mis. pesanan)."
            );
        } catch (\Throwable $e) {
            $this->cancelDelete();
            session()->flash(
                'message',
                "Terjadi kesalahan saat menghapus '{$itemName}': " . $e->getMessage()
            );
        }
    }

    /** ---------------- PROVIDERS ---------------- **/

    public function getOngoingRentalsProperty()
    {
        return Rental::with("item", "user")
            ->where("status", "ongoing")
            ->orderBy("start_date")
            ->paginate(10, ["*"], "ongoing");
    }

    public function getBookedRentalsProperty()
    {
        return Rental::with("item", "user")
            ->where("status", "booked")
            ->orderBy("start_date")
            ->paginate(10, ["*"], "booked");
    }

    public function getItemsProperty()
    {
        return Item::with(["category", "location"])
            ->when($this->search, function ($q) {
                $term = "%{$this->search}%";
                $q->where(function ($qq) use ($term) {
                    $qq->where("name", "like", $term)->orWhere(
                        "description",
                        "like",
                        $term,
                    );
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
    }

    public function render()
    {
        $this->autoTransitionBookings();

        $this->bookableItems = Item::orderBy("name")->get(["id", "name"]);

        return view("livewire.admin.item-management", [
            "ongoingRentals" => $this->ongoingRentals,
            "bookedRentals" => $this->bookedRentals,
            "items" => $this->items,
            "totalItems" => Item::count(),
            "categories" => Category::orderBy("name")->get(["id", "name"]),
            "locations" => Location::orderBy("name")->get(["id", "name"]),
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}