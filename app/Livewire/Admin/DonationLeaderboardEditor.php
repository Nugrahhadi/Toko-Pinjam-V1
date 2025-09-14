<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\DonationLeaderboard;
use Illuminate\Support\Facades\DB;

class DonationLeaderboardEditor extends Component
{
    public array $rows = [];
    public array $userOptions = [];

    public function mount(): void
    {
        $this->userOptions = User::query()
            ->orderByRaw("COALESCE(NULLIF(full_name,''), name) ASC")
            ->get(['id', 'name', 'full_name', 'email'])
            ->map(fn ($u) => [
                'id'    => $u->id,
                'label' => ($u->full_name ?: $u->name ?: '—') . ' — ' . $u->email,
            ])
            ->toArray();

        $existing = DonationLeaderboard::query()
            ->with('user')
            ->orderBy('position')
            ->orderByDesc('amount')
            ->take(10)
            ->get()
            ->keyBy('position');

        for ($i = 1; $i <= 10; $i++) {
            $row = $existing->get($i);
            $this->rows[$i] = [
                'id'           => $row->id ?? null,
                'position'     => $i,
                'user_id'      => $row->user_id ?? null,
                'display_name' => $row->display_name ?? '',
                'amount'       => $row->amount ?? null,
            ];
        }
    }

    /**
     * Dipanggil dari JS Sortable saat urutan card berubah.
     * $order = [['value' => '1'], ['value' => '2'], ...]  (value = index lama)
     */
    public function reorder($order): void
    {
        $new = [];
        $i = 1;

        foreach ($order as $item) {
            $oldIndex = (int) ($item['value'] ?? 0);
            if ($oldIndex < 1 || $oldIndex > 10 || empty($this->rows[$oldIndex])) {
                continue;
            }
            $row = $this->rows[$oldIndex];
            $row['position'] = $i;
            $new[$i] = $row;
            $i++;
        }

        // Pertahankan apa pun yang tidak ikut terseret (harusnya tidak ada).
        $this->rows = $new + array_diff_key($this->rows, $new);
    }

    public function save(): void
    {
        // Validasi
        $used = [];
        for ($i = 1; $i <= 10; $i++) {
            $r = $this->rows[$i];

            if (!empty($r['user_id'])) {
                if (in_array($r['user_id'], $used, true)) {
                    $this->addError("rows.$i.user_id", 'User duplikat di posisi lain.');
                    return;
                }
                $used[] = $r['user_id'];
            }

            if (!is_null($r['amount']) && (!is_numeric($r['amount']) || $r['amount'] < 0)) {
                $this->addError("rows.$i.amount", 'Nominal tidak valid.');
                return;
            }
        }

        // Simpan aman (lift + upsert + bersih)
        DB::transaction(function () {
            DonationLeaderboard::whereIn('position', range(1, 10))
                ->update(['position' => DB::raw('position + 1000')]);

            $payloads = [];
            for ($i = 1; $i <= 10; $i++) {
                $r = $this->rows[$i];
                if (empty($r['user_id'])) continue;
                $payloads[] = [
                    'user_id'      => (int) $r['user_id'],
                    'display_name' => $r['display_name'] ?: null,
                    'amount'       => (float) ($r['amount'] ?? 0),
                    'position'     => $i,
                ];
            }

            if (!empty($payloads)) {
                DonationLeaderboard::upsert(
                    $payloads,
                    ['user_id'],
                    ['display_name', 'amount', 'position']
                );
            }

            DonationLeaderboard::where('position', '>=', 1001)->delete();
        });

        session()->flash('message', 'Top 10 leaderboard disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.donation-leaderboard-editor')
            ->extends('layouts.admin')
            ->section('content');
    }
}
