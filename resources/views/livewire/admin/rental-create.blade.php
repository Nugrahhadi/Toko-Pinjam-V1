@section('title', 'Tambah Pesanan')

<div class="bg-white rounded-xl shadow-sm border p-6">
    @if (session()->has('message'))
        <div class="mb-4 text-green-700 bg-green-50 border border-green-200 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @error('form')
        <div class="mb-4 text-red-700 bg-red-50 border border-red-200 px-4 py-3 rounded-lg">
            {{ $message }}
        </div>
    @enderror

    <form wire:submit.prevent="save" class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Barang</label>
            <select wire:model="item_id" class="mt-1 w-full border rounded-md p-2">
                <option value="">Pilih barang</option>
                @foreach($items as $it)
                    <option value="{{ $it->id }}">{{ $it->name }} (stok: {{ $it->stock }})</option>
                @endforeach
            </select>
            @error('item_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

            {{-- Tampilkan stok tersisa sekarang --}}
            @if(!is_null($available))
                <p class="mt-1 text-sm text-gray-600">Tersedia saat ini: <strong>{{ $available }}</strong></p>
            @endif
        </div>

        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" min="1" wire:model.defer="quantity" class="mt-1 w-full border rounded-md p-2">
                @error('quantity') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Mulai</label>
                <input type="date" wire:model="start_date" class="mt-1 w-full border rounded-md p-2">
                @error('start_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Selesai</label>
                <input type="date" wire:model="end_date" class="mt-1 w-full border rounded-md p-2">
                @error('end_date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Catatan (opsional)</label>
            <textarea rows="3" wire:model.defer="note" class="mt-1 w-full border rounded-md p-2"></textarea>
            @error('note') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#433592] to-[#5B4B8A] text-white rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
