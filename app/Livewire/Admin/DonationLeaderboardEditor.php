<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\DonationLeaderboard;

class DonationLeaderboardEditor extends Component
{
    public array $rows = []; // 10 baris: [id?, position, user_id, display_name, amount]
    public $userOptions = [];

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

        $existing = DonationLeaderboard::query()
            ->with("user")
            ->orderBy("position")
            ->orderByDesc("amount")
            ->take(10)
            ->get()
            ->keyBy("position");

        for ($i = 1; $i <= 10; $i++) {
            $row = $existing->get($i);
            $this->rows[$i] = [
                "id" => $row->id ?? null,
                "position" => $i,
                "user_id" => $row->user_id ?? null,
                "display_name" => $row->display_name ?? "",
                "amount" => $row->amount ?? null,
            ];
        }
    }

    public function save(): void
    {
        // Validasi dasar + cek duplicate user
        $used = [];
        for ($i = 1; $i <= 10; $i++) {
            $r = $this->rows[$i];

            if (!empty($r["user_id"])) {
                if (in_array($r["user_id"], $used, true)) {
                    $this->addError(
                        "rows.$i.user_id",
                        "User duplikat di posisi lain.",
                    );
                    return;
                }
                $used[] = $r["user_id"];
            }

            if (
                !is_null($r["amount"]) &&
                (!is_numeric($r["amount"]) || $r["amount"] < 0)
            ) {
                $this->addError("rows.$i.amount", "Nominal tidak valid.");
                return;
            }
        }

        // Simpan/update
        for ($i = 1; $i <= 10; $i++) {
            $r = $this->rows[$i];

            // Jika kosong total, dan ada ID -> hapus
            if (empty($r["user_id"]) && !empty($r["id"])) {
                DonationLeaderboard::where("id", $r["id"])->delete();
                continue;
            }

            // Jika kosong total -> lewati
            if (empty($r["user_id"])) {
                continue;
            }

            $payload = [
                "user_id" => (int) $r["user_id"],
                "display_name" => $r["display_name"] ?: null,
                "amount" => (float) ($r["amount"] ?? 0),
                "position" => (int) $i,
            ];

            if (!empty($r["id"])) {
                DonationLeaderboard::where("id", $r["id"])->update($payload);
            } else {
                DonationLeaderboard::updateOrCreate(
                    ["user_id" => (int) $r["user_id"]],
                    $payload,
                );
            }
        }

        session()->flash("message", "Top 10 leaderboard disimpan.");
    }

    public function render()
    {
        return view("livewire.admin.donation-leaderboard-editor")
            ->extends("layouts.admin")
            ->section("content");
    }
}
