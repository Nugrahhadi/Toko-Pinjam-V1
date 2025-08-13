{{-- resources/views/livewire/admin/item-management.blade.php --}}
@section('title', 'Kelola Barang')

<div>
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Barang</h1>
            <p class="text-gray-600">Kelola sewa, booking, dan data barang</p>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
            <a href="{{ route('admin.rentals.create') }}"
               class="px-4 py-2 bg-gradient-to-r from-[#433592] to-[#5B4B8A] text-white rounded-lg">
               + Tambah Pesanan
            </a>
            <a href="{{ route('admin.items.create') }}"
               class="px-4 py-2 bg-[#433592] text-white rounded-lg">
               + Tambah Barang
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Total Barang</p>
            <p class="text-2xl font-bold">{{ $totalItems }}</p>
        </div>
    </div>

    {{-- Sedang Dipinjam --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-10">
        <div class="px-6 py-4 border-b bg-gray-50">
            <h2 class="text-lg font-semibold">Sedang Dipinjam</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($ongoingRentals as $r)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $r->item->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $r->quantity }}</td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($r->start_date)->format('d M Y') }} –
                                {{ \Carbon\Carbon::parse($r->end_date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    wire:click="markReturned({{ $r->id }})"
                                    class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-md hover:bg-green-700">
                                    Sudah Kembali
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada barang yang sedang dipinjam.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($ongoingRentals->hasPages())
            <div class="px-6 py-3 border-t">{{ $ongoingRentals->links() }}</div>
        @endif
    </div>

    {{-- Sedang Dipesan (BOOKED) --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-10">
        <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Sedang Dipesan</h2>
            <a href="{{ route('admin.rentals.create') }}"
               class="px-3 py-1.5 text-sm bg-[#433592] text-white rounded-md">
               + Tambah Pesanan
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($bookedRentals as $r)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $r->item->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $r->quantity }}</td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($r->start_date)->format('d M Y') }} –
                                {{ \Carbon\Carbon::parse($r->end_date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    Booked
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button
                                  wire:click="openEditModal({{ $r->id }})"
                                  class="text-[#433592] hover:underline">
                                  Edit
                                </button>
                                <button
                                  wire:click="deleteBooking({{ $r->id }})"
                                  class="text-red-600 ml-3 hover:underline">
                                  Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada pesanan aktif.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($bookedRentals->hasPages())
            <div class="px-6 py-3 border-t">{{ $bookedRentals->links() }}</div>
        @endif
    </div>

    {{-- Semua Barang --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div class="text-sm text-gray-600">
                Daftar semua barang
            </div>
            <div class="flex items-center gap-3">
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Cari barang..."
                       class="border rounded-md px-3 py-2">
                <a href="{{ route('admin.items.create') }}"
                   class="px-3 py-2 bg-[#433592] text-white rounded-md">
                   + Tambah Barang
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase cursor-pointer"
                            wire:click="sortBy('name')">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok Tersisa</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($items as $it)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $it->name }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm">Harga Asli: {{ $it->original_price ? 'Rp'.number_format($it->original_price) : '-' }}</div>
                                <div class="text-sm">Harga Donasi: Rp{{ number_format($it->donation_price) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                {{ (int)$it->stock }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.items.edit', $it->id) }}"
                                   class="text-[#433592] hover:underline">Edit</a>
                                <button
                                    wire:click="confirmDelete({{ $it->id }})"
                                    class="text-red-600 ml-3 hover:underline">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">Belum ada barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($items->hasPages())
            <div class="px-6 py-3 border-t">{{ $items->links() }}</div>
        @endif
    </div>

    {{-- MODAL: Konfirmasi Hapus Item --}}
    @if($showDeleteModal)
    <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="cancelDelete">
        <div class="bg-white w-full max-w-md rounded-xl p-6" wire:click.stop>
            <h3 class="text-lg font-semibold mb-2">Hapus Barang</h3>
            <p class="text-sm text-gray-600 mb-5">Apakah Anda yakin ingin menghapus barang ini? Tindakan tidak dapat dibatalkan.</p>
            <div class="flex justify-end gap-3">
                <button wire:click="cancelDelete" class="px-4 py-2 rounded-md border">Batal</button>
                <button wire:click="deleteItem" class="px-4 py-2 rounded-md bg-red-600 text-white">Hapus</button>
            </div>
        </div>
    </div>
    @endif

    {{-- MODAL: Edit Pesanan (BOOKED) --}}
    @if($showEditModal)
    <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="$set('showEditModal', false)">
        <div class="bg-white w-full max-w-lg rounded-xl p-6" wire:click.stop>
            <h3 class="text-lg font-semibold mb-4">Edit Pesanan (Booked)</h3>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Barang</label>
                    <select wire:model.defer="edit_item_id" class="w-full border rounded-md px-3 py-2">
                        @foreach($bookableItems as $it2)
                            <option value="{{ $it2->id }}">{{ $it2->name }}</option>
                        @endforeach
                    </select>
                    @error('edit_item_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <input type="number" min="1" wire:model.defer="edit_quantity" class="w-full border rounded-md px-3 py-2">
                        @error('edit_quantity') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mulai</label>
                        <input type="date" wire:model.defer="edit_start_date" class="w-full border rounded-md px-3 py-2">
                        @error('edit_start_date') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Selesai</label>
                        <input type="date" wire:model.defer="edit_end_date" class="w-full border rounded-md px-3 py-2">
                        @error('edit_end_date') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                    <textarea rows="3" wire:model.defer="edit_note" class="w-full border rounded-md px-3 py-2"></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button wire:click="$set('showEditModal', false)" class="px-4 py-2 rounded-md border">Batal</button>
                <button wire:click="updateBooking" class="px-4 py-2 rounded-md bg-[#433592] text-white">Simpan</button>
            </div>
        </div>
    </div>
    @endif
</div>
