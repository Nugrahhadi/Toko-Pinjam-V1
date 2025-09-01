@section('title', 'Kelola Testimoni')

<div class="space-y-6">
    @if (session()->has('message'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold">Testimoni</h2>
        <a href="{{ route('admin.donation.index') }}" class="text-[#433592] hover:underline">← Kembali ke Donasi Editor</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- LIST --}}
        <div class="lg:col-span-2 bg-white border rounded-xl">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Pesan</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($testimonials as $t)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">
                                    {{ $t->display_name ?? ($t->user->full_name ?? $t->user->name ?? '-') }}
                                </td>
                                <td class="px-4 py-2">{{ $t->message }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 text-xs rounded {{ $t->approved ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                        {{ $t->approved ? 'Approved' : 'Hidden' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- EDIT --}}
                                        <button
                                            class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-[#433592] text-white hover:opacity-90"
                                            wire:click="edit({{ $t->id }})"
                                            title="Edit testimoni">
                                            {{-- icon --}}
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM21.41 6.34a1.25 1.25 0 0 0 0-1.77l-2.99-2.99a1.25 1.25 0 0 0-1.77 0l-1.83 1.83 3.75 3.75 1.84-1.82z"/>
                                            </svg>
                                            <span class="text-sm">Edit</span>
                                        </button>

                                        {{-- TOGGLE --}}
                                        <button
                                            class="inline-flex items-center gap-1 px-3 py-1 rounded-md border hover:bg-gray-50"
                                            wire:click="toggleApprove({{ $t->id }})"
                                            title="{{ $t->approved ? 'Sembunyikan' : 'Tampilkan' }}">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10z"/>
                                            </svg>
                                            <span class="text-sm">{{ $t->approved ? 'Sembunyikan' : 'Tampilkan' }}</span>
                                        </button>

                                        {{-- HAPUS --}}
                                        <button
                                            class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-red-600 text-white hover:bg-red-700"
                                            wire:click="confirmDelete({{ $t->id }})"
                                            title="Hapus testimoni">
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M6 7h12v13a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7zm3-4h6l1 1h4v2H4V4h4l1-1z"/>
                                            </svg>
                                            <span class="text-sm">Hapus</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada testimoni.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($testimonials->hasPages())
                <div class="px-4 py-3 border-t">{{ $testimonials->links() }}</div>
            @endif
        </div>

        {{-- FORM --}}
        <div class="bg-white border rounded-xl p-4">
            <h3 class="text-md font-semibold mb-3">{{ $editing_id ? 'Edit Testimoni' : 'Tambah Testimoni' }}</h3>

            <label class="block text-sm text-gray-700">User</label>
            <select class="user-select w-full border rounded-md px-3 py-2" wire:model="ts_user_id">
                <option value="">— Pilih user —</option>
                @foreach($userOptions as $u)
                    <option value="{{ $u['id'] }}">{{ $u['label'] }}</option>
                @endforeach
            </select>
            @error('ts_user_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror

            <label class="block text-sm text-gray-700 mt-3">Nama tampil (opsional)</label>
            <input type="text" class="w-full border rounded-md px-3 py-2" placeholder="Override nama tampilan"
                   wire:model.defer="ts_display_name">
            @error('ts_display_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror

            <label class="block text-sm text-gray-700 mt-3">Pesan</label>
            <textarea rows="4" class="w-full border rounded-md px-3 py-2" wire:model.defer="ts_message"></textarea>
            @error('ts_message') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror

            <div class="mt-3">
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" class="rounded border-gray-300" wire:model="ts_approved">
                    <span class="text-sm text-gray-700">Tampilkan (Approved)</span>
                </label>
            </div>

            <label class="block text-sm text-gray-700 mt-3">Posisi (opsional)</label>
            <input type="number" min="1" class="w-full border rounded-md px-3 py-2" wire:model.defer="ts_position">
            @error('ts_position') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror

            <div class="mt-4 flex items-center gap-3">
                <button wire:click="save" class="px-4 py-2 bg-[#433592] text-white rounded-lg">{{ $editing_id ? 'Update' : 'Tambah' }}</button>
                @if($editing_id)
                    <button wire:click="resetForm" class="px-4 py-2 border rounded-lg">Batal</button>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal konfirmasi hapus --}}
    @if($confirmingDeleteId)
    <div class="fixed inset-0 z-40 bg-black/40 flex items-center justify-center" wire:key="modal-delete">
        <div class="bg-white w-full max-w-md rounded-xl p-6 shadow-lg">
            <h3 class="text-lg font-semibold mb-2">Hapus Testimoni</h3>
            <p class="text-sm text-gray-600 mb-6">Yakin ingin menghapus testimoni ini? Tindakan tidak bisa dibatalkan.</p>
            <div class="flex justify-end gap-3">
                <button wire:click="cancelDelete" class="px-4 py-2 rounded-md border">Batal</button>
                <button wire:click="deleteConfirmed" class="px-4 py-2 rounded-md bg-red-600 text-white">Hapus</button>
            </div>
        </div>
    </div>
    @endif
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
