{{-- resources/views/livewire/admin/transaction-management.blade.php --}}
@section('title', 'Kelola Transaksi')

<div class="space-y-6">
    @if (session()->has('message'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    {{-- TOTAL SELURUH TRANSAKSI (di luar tabel, di atas) --}}
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg font-semibold">
        Total Transaksi (seluruh data): Rp{{ number_format($allGrandTotal, 0, ',', '.') }}
    </div>

    {{-- CARD: FILTER + TABEL --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold">Riwayat Transaksi</h2>
            <p class="text-sm text-gray-600">Filter dan tabel berada dalam satu kotak. Jika tidak memilih filter, semua transaksi akan ditampilkan.</p>
        </div>

        <!-- FILTER -->
        <div class="px-6 py-4 border-b">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Tanggal Mulai -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
                    <input type="date" wire:model.live="fromDate" class="w-full border rounded-md px-3 py-2">
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sampai Tanggal</label>
                    <input type="date" wire:model.live="toDate" class="w-full border rounded-md px-3 py-2">
                </div>

                <!-- Filter User (dropdown multiselect via Tom Select) -->
                <div wire:ignore>
                    <label for="userFilterSelect" class="block text-sm font-medium text-gray-700 mb-1">User</label>
                    <select id="userFilterSelect" multiple class="w-full border rounded-md px-3 py-2">
                        @foreach($usersList as $u)
                            <option value="{{ $u->id }}" @selected(in_array($u->id, $userFilter, true))>
                                {{ $u->full_name ?: $u->name ?: '—' }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Pilih 0 atau lebih user.</p>
                </div>

                <!-- Filter Barang (dropdown multiselect via Tom Select) -->
                <div wire:ignore>
                    <label for="itemFilterSelect" class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
                    <select id="itemFilterSelect" multiple class="w-full border rounded-md px-3 py-2">
                        @foreach($itemsList as $it)
                            <option value="{{ $it->id }}" @selected(in_array($it->id, $itemFilter, true))>
                                {{ $it->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Pilih 0 atau lebih barang.</p>
                </div>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Gunakan kombinasi filter di atas. Klik
                    <button wire:click="clearFilters" class="text-[#433592] hover:underline">reset</button>
                    untuk menghapus semua filter.
                </div>
            </div>
        </div>

        <!-- TABEL -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Pinjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Biaya</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($rentals as $t)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $t->user->full_name ?? $t->user->name ?? '—' }}</td>
                            <td class="px-6 py-4">{{ $t->item->name ?? '—' }}</td>
                            <td class="px-6 py-4">
                                {{ $t->start_date?->format('d M Y') }} – {{ $t->end_date?->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">{{ (int) $t->quantity }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($this->computeTotal($t), 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $badge = match($t->status){
                                        'booked'   => 'bg-orange-100 text-orange-800',
                                        'ongoing'  => 'bg-blue-100 text-blue-800',
                                        'returned' => 'bg-green-100 text-green-800',
                                        'cancelled'=> 'bg-gray-200 text-gray-700',
                                        default    => 'bg-gray-200 text-gray-700',
                                    };
                                @endphp
                                <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badge }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="openEdit({{ $t->id }})" class="text-[#433592] hover:underline">Edit</button>
                                <button wire:click="delete({{ $t->id }})" class="text-red-600 hover:underline ml-3">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                Belum ada transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rentals->hasPages())
            <div class="px-6 py-3 border-t">
                {{ $rentals->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL: EDIT TRANSAKSI --}}
    @if($showEditModal)
        <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="$set('showEditModal', false)">
            <div class="bg-white w-full max-w-lg rounded-xl p-6" wire:click.stop>
                <h3 class="text-lg font-semibold mb-4">Edit Transaksi</h3>

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select wire:model.defer="edit_status" class="w-full border rounded-md px-3 py-2">
                            <option value="booked">Booked</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="returned">Returned</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        @error('edit_status') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Total Biaya (Rp)</label>
                        <input type="number" min="0" step="1" wire:model.defer="edit_total_override" class="w-full border rounded-md px-3 py-2">
                        <p class="text-xs text-gray-500 mt-1">Nilai ini akan disimpan sebagai <strong>override</strong>. Jika dikosongkan, sistem menghitung otomatis dari harga barang × hari × qty.</p>
                        @error('edit_total_override') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                        <textarea rows="3" wire:model.defer="edit_note" class="w-full border rounded-md px-3 py-2"></textarea>
                        @error('edit_note') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button wire:click="$set('showEditModal', false)" class="px-4 py-2 rounded-md border">Batal</button>
                    <button wire:click="saveEdit" class="px-4 py-2 rounded-md bg-[#433592] text-white">Simpan</button>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('livewire:navigated', () => {
    // USER FILTER TomSelect
    const userSel = document.getElementById('userFilterSelect');
    if (userSel) {
        if (userSel.tomselect) { userSel.tomselect.destroy(); }
        const tsUser = new TomSelect(userSel, {
            plugins: ['remove_button','dropdown_input'],
            create: false,
            placeholder: 'Pilih user...',
            maxOptions: 5000,
            valueField: 'value',
            labelField: 'text',
            searchField: ['text']
        });
        // set nilai awal dari Livewire
        try { tsUser.setValue(@json($userFilter).map(String), true); } catch(e) {}
        // sinkron ke Livewire
        tsUser.on('change', (vals) => {
            const asInt = (vals || []).map(v => parseInt(v,10)).filter(v => !isNaN(v));
            window.Livewire.find(@this.__instance.id).set('userFilter', asInt);
        });
    }

    // ITEM FILTER TomSelect
    const itemSel = document.getElementById('itemFilterSelect');
    if (itemSel) {
        if (itemSel.tomselect) { itemSel.tomselect.destroy(); }
        const tsItem = new TomSelect(itemSel, {
            plugins: ['remove_button','dropdown_input'],
            create: false,
            placeholder: 'Pilih barang...',
            maxOptions: 5000,
            valueField: 'value',
            labelField: 'text',
            searchField: ['text']
        });
        // set nilai awal dari Livewire
        try { tsItem.setValue(@json($itemFilter).map(String), true); } catch(e) {}
        // sinkron ke Livewire
        tsItem.on('change', (vals) => {
            const asInt = (vals || []).map(v => parseInt(v,10)).filter(v => !isNaN(v));
            window.Livewire.find(@this.__instance.id).set('itemFilter', asInt);
        });
    }
});
</script>
@endpush
