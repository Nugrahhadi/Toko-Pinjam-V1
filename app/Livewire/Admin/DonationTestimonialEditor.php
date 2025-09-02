<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\DonationTestimonial;

class DonationTestimonialEditor extends Component
{
    use WithPagination;

    public $userOptions = [];

    // form
    public $editing_id = null;
    public $ts_user_id = null;
    public $ts_display_name = "";
    public $ts_message = "";
    public $ts_approved = true;
    public $ts_position = null;

    // modal konfirmasi hapus
    public $confirmingDeleteId = null;

    protected $rules = [
        "ts_user_id" => ["required", "exists:users,id"],
        "ts_display_name" => ["nullable", "string", "max:255"],
        "ts_message" => ["required", "string", "min:5"],
        "ts_approved" => ["boolean"],
        "ts_position" => ["nullable", "integer", "min:1"],
    ];

    public function mount(): void
    {
        $this->userOptions = User::query()
            ->orderByRaw("COALESCE(NULLIF(full_name,''), name) ASC")
            ->get(["id", "name", "full_name", "email"])
            ->map(
                fn($u) => [
                    "id" => $u->id,
                    "label" =>
                        ($u->full_name ?: $u->name ?: "—") . " — " . $u->email,
                ],
            )
            ->toArray();
    }

    public function edit(int $id): void
    {
        $t = DonationTestimonial::findOrFail($id);
        $this->editing_id = $t->id;
        $this->ts_user_id = $t->user_id;
        $this->ts_display_name = (string) ($t->display_name ?? "");
        $this->ts_message = $t->message;
        $this->ts_approved = (bool) $t->approved;
        $this->ts_position = $t->position;
    }

    public function resetForm(): void
    {
        $this->editing_id = null;
        $this->ts_user_id = null;
        $this->ts_display_name = "";
        $this->ts_message = "";
        $this->ts_approved = true;
        $this->ts_position = null;
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $payload = [
            "user_id" => (int) $this->ts_user_id,
            "display_name" => $this->ts_display_name ?: null,
            "message" => $this->ts_message,
            "approved" => (bool) $this->ts_approved,
            "position" => $this->ts_position ? (int) $this->ts_position : null,
        ];

        if ($this->editing_id) {
            DonationTestimonial::where("id", $this->editing_id)->update(
                $payload,
            );
            session()->flash("message", "Testimoni diperbarui.");
        } else {
            DonationTestimonial::create($payload);
            session()->flash("message", "Testimoni dibuat.");
        }

        $this->resetForm();
    }

    public function toggleApprove(int $id): void
    {
        $row = DonationTestimonial::findOrFail($id);
        $row->update(["approved" => !$row->approved]);
    }

    /* ---- HAPUS + KONFIRMASI ---- */

    public function confirmDelete(int $id): void
    {
        $this->confirmingDeleteId = $id;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDeleteId = null;
    }

    public function deleteConfirmed(): void
    {
        if (!$this->confirmingDeleteId) {
            return;
        }

        $id = $this->confirmingDeleteId;
        DonationTestimonial::findOrFail($id)->delete();
        $this->confirmingDeleteId = null;

        if ($this->editing_id === $id) {
            $this->resetForm();
        }

        session()->flash("message", "Testimoni dihapus.");
    }

    public function render()
    {
        $testimonials = DonationTestimonial::with("user")
            ->latest("id")
            ->paginate(10);

        return view("livewire.admin.donation-testimonial-editor", [
            "testimonials" => $testimonials,
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}
