@section('title', 'Kelola Leaderboard')

<div class="space-y-6">
    @if (session()->has('message'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold">Leaderboard Donasi</h2>
        <a href="{{ route('admin.donation.index') }}" class="text-[#433592] hover:underline">← Kembali ke Donasi Editor</a>
    </div>

    <div class="bg-white border rounded-xl p-4">
        {{-- Container yang akan dibuat Sortable --}}
        <div id="leaderboard-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @for ($i=1; $i<=10; $i++)
                <div class="border rounded-lg p-4" data-index="{{ $i }}" wire:key="row-{{ $i }}">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-xs text-gray-500">Posisi #{{ $i }}</div>
                        <button type="button"
                                class="drag-handle cursor-move text-gray-400 hover:text-gray-600"
                                title="Drag untuk pindah">↕</button>
                    </div>

                    {{-- user --}}
                    <label class="block text-sm text-gray-700">User</label>
                    <select class="user-select w-full border rounded-md px-3 py-2"
                            wire:model="rows.{{ $i }}.user_id">
                        <option value="">— Pilih user —</option>
                        @foreach($userOptions as $u)
                            <option value="{{ $u['id'] }}">{{ $u['label'] }}</option>
                        @endforeach
                    </select>
                    @error("rows.$i.user_id") <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror

                    {{-- display name (manual) --}}
                    <label class="block text-sm text-gray-700 mt-3">Nama tampil (opsional)</label>
                    <input type="text" class="w-full border rounded-md px-3 py-2"
                           placeholder="Override nama tampilan"
                           wire:model.defer="rows.{{ $i }}.display_name">

                    {{-- amount --}}
                    <label class="block text-sm text-gray-700 mt-3">Nominal (Rp)</label>
                    <input type="number" step="0.01" class="w-full border rounded-md px-3 py-2"
                           wire:model.defer="rows.{{ $i }}.amount">
                    @error("rows.$i.amount") <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            @endfor
        </div>

        <div class="mt-4 text-right">
            <button wire:click="save" class="px-4 py-2 bg-[#433592] text-white rounded-lg">Simpan</button>
        </div>
    </div>
</div>

@push('scripts')
{{-- 1) Muat SortableJS --}}
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

<script>
/**
 * Inisialisasi TomSelect + Sortable setelah Livewire render/navigate.
 * Kita set flag data-attr supaya tidak double-init.
 */
function initTomSelect() {
    document.querySelectorAll('select.user-select').forEach((el) => {
        if (!el.tomselect) {
            new TomSelect(el, {
                create: false,
                maxOptions: 5000,
                sortField: { field: "text", direction: "asc" },
                placeholder: "Cari user..."
            });
        }
    });
}

function initSortableGrid() {
    const grid = document.getElementById('leaderboard-grid');
    if (!grid || grid.dataset.sortableInit === '1') return;
    grid.dataset.sortableInit = '1';

    new Sortable(grid, {
        animation: 150,
        handle: '.drag-handle',
        ghostClass: 'bg-purple-50',
        onEnd: function () {
            // Baca urutan DOM lalu kirim ke Livewire::reorder
            const order = Array.from(grid.querySelectorAll('[data-index]'))
                .map(el => ({ value: el.dataset.index }));
            @this.call('reorder', order);
        }
    });
}

document.addEventListener('livewire:load', () => {
    initTomSelect();
    initSortableGrid();
});

// Jika pakai navigate di Livewire v3
document.addEventListener('livewire:navigated', () => {
    initTomSelect();
    initSortableGrid();
});

// Jika bukan pakai navigate, tapi rerender biasa:
document.addEventListener('livewire:initialized', () => {
    if (window.Livewire) {
        Livewire.hook('message.processed', () => {
            initTomSelect();
            initSortableGrid();
        });
    }
});
</script>
@endpush
