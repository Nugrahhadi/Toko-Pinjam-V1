<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rental;
use App\Models\User;
use App\Models\Item;

class TransactionManagement extends Component
{
    use WithPagination;

    /** Filters */
    public ?string $fromDate = null;
    public ?string $toDate = null;
    /** @var array<int> */
    public array $userFilter = [];
    /** @var array<int> */
    public array $itemFilter = [];

    public int $perPage = 10;

    /** Edit modal */
    public bool $showEditModal = false;
    public ?int $editId = null;
    public string $edit_status = "booked"; // booked|ongoing|returned|cancelled
    public ?float $edit_total_override = null;
    public ?string $edit_note = "";

    protected $queryString = [
        "fromDate" => ["except" => ""],
        "toDate" => ["except" => ""],
        "userFilter" => ["as" => "u", "except" => []],
        "itemFilter" => ["as" => "i", "except" => []],
        "page" => ["except" => 1],
    ];

    protected $rules = [
        "edit_status" => "required|in:booked,ongoing,returned,cancelled",
        "edit_total_override" => "nullable|numeric|min:0",
        "edit_note" => "nullable|string",
    ];

    public function updatingFromDate()
    {
        $this->resetPage();
    }
    public function updatingToDate()
    {
        $this->resetPage();
    }
    public function updatingUserFilter()
    {
        $this->resetPage();
    }
    public function updatingItemFilter()
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->fromDate = null;
        $this->toDate = null;
        $this->userFilter = [];
        $this->itemFilter = [];
        $this->resetPage();
    }

    protected function baseQuery()
    {
        return Rental::with(["user", "item"])
            ->when(
                $this->fromDate,
                fn($q) => $q->whereDate("start_date", ">=", $this->fromDate),
            )
            ->when(
                $this->toDate,
                fn($q) => $q->whereDate("end_date", "<=", $this->toDate),
            )
            ->when(
                $this->userFilter,
                fn($q) => $q->whereIn("user_id", $this->userFilter),
            )
            ->when(
                $this->itemFilter,
                fn($q) => $q->whereIn("item_id", $this->itemFilter),
            );
    }

    public function getRentalsProperty()
    {
        return $this->baseQuery()->orderByDesc("id")->paginate($this->perPage);
    }

    /** Total seluruh transaksi (tanpa mempertimbangkan filter) */
    public function getAllGrandTotalProperty(): float
    {
        $sum = 0;
        foreach (Rental::with("item")->get() as $r) {
            $sum += $this->computeTotal($r);
        }
        return $sum;
    }

    /** ==== Edit modal ==== */
    public function openEdit(int $id): void
    {
        $r = Rental::with(["item", "user"])->findOrFail($id);

        $this->editId = $r->id;
        $this->edit_status = $r->status;
        $this->edit_note = $this->stripTotalMarker((string) ($r->note ?? ""));
        $this->edit_total_override =
            $this->extractCustomTotal((string) ($r->note ?? "")) ??
            $this->computeTotal($r);

        $this->showEditModal = true;
    }

    public function saveEdit(): void
    {
        $this->validate();

        $r = Rental::findOrFail($this->editId);

        $payload = ["status" => $this->edit_status];

        // Simpan override total di note: [TOTAL:12345] <note>
        $plain = trim((string) ($this->edit_note ?? ""));
        $payload["note"] = $this->writeCustomTotalToNote(
            $plain,
            $this->edit_total_override,
        );

        $r->update($payload);

        $this->showEditModal = false;
        session()->flash("message", "Transaksi diperbarui.");
    }

    public function delete(int $id): void
    {
        Rental::findOrFail($id)->delete();
        session()->flash("message", "Transaksi dihapus.");
    }

    /** ==== Helpers: hitung total ==== */
    public function computeTotal(Rental $r): float
    {
        // 1) pakai override jika ada
        $override = $this->extractCustomTotal((string) ($r->note ?? ""));
        if (!is_null($override)) {
            return (float) $override;
        }

        // 2) fallback: harga per hari × hari (inklusif) × qty
        $price = (float) ($r->item->donation_price ?? 0);
        $qty = (int) ($r->quantity ?? 1);

        $days = 1;
        if ($r->start_date && $r->end_date) {
            $days = max(1, $r->start_date->diffInDays($r->end_date) + 1);
        }
        return $price * $qty * $days;
    }

    /** ==== Helpers: total marker di note ==== */
    protected function extractCustomTotal(?string $note): ?float
    {
        if (!$note) {
            return null;
        }
        if (preg_match("/\[TOTAL:\s*([0-9]+)\s*\]/", $note, $m)) {
            return (float) $m[1];
        }
        return null;
    }

    protected function stripTotalMarker(string $note): string
    {
        return trim(preg_replace("/^\s*\[TOTAL:\s*[0-9]+\s*\]\s*/", "", $note));
    }

    protected function writeCustomTotalToNote(
        string $plainNote,
        ?float $total,
    ): string {
        $marker = is_null($total) ? "" : "[TOTAL:" . (int) round($total) . "] ";
        $n = $this->stripTotalMarker($plainNote);
        return trim($marker . $n);
    }

    public function render()
    {
        return view("livewire.admin.transaction-management", [
            "rentals" => $this->rentals,
            "usersList" => User::orderByRaw(
                "COALESCE(NULLIF(full_name,''), name) ASC",
            )->get(["id", "name", "full_name"]),
            "itemsList" => Item::orderBy("name")->get(["id", "name"]),
            "allGrandTotal" => $this->allGrandTotal, // total seluruh transaksi (di luar tabel, di atas)
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}
