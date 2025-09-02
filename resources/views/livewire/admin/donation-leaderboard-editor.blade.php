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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @for ($i=1; $i<=10; $i++)
                <div class="border rounded-lg p-4">
                    <div class="text-xs text-gray-500 mb-2">Posisi #{{ $i }}</div>

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
<script>
document.addEventListener("livewire:navigated", () => {
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
});
</script>
@endpush
