@section('title', $item ? 'Edit Barang' : 'Tambah Barang')

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
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
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" wire:model.defer="name" class="mt-1 w-full border rounded-md p-2">
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Slug (opsional)</label>
                <input type="text" wire:model.defer="slug" class="mt-1 w-full border rounded-md p-2">
                @error('slug') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select wire:model.defer="category_id" class="mt-1 w-full border rounded-md p-2 bg-white">
                    <option value="">Pilih kategori</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                <select wire:model.defer="location_id" class="mt-1 w-full border rounded-md p-2 bg-white">
                    <option value="">Pilih lokasi</option>
                    @foreach($locations as $l)
                        <option value="{{ $l->id }}">{{ $l->name }}</option>
                    @endforeach
                </select>
                @error('location_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga Asli</label>
                <input type="number" step="0.01" wire:model.defer="original_price" class="mt-1 w-full border rounded-md p-2">
                @error('original_price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga Donasi</label>
                <input type="number" step="0.01" wire:model.defer="donation_price" class="mt-1 w-full border rounded-md p-2">
                @error('donation_price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" wire:model.defer="stock" class="mt-1 w-full border rounded-md p-2">
                @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea rows="5" wire:model.defer="description" class="mt-1 w-full border rounded-md p-2"></textarea>
                @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Upload gambar dari komputer --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Gambar (boleh pilih banyak)</label>
                <input type="file" wire:model="image_files" multiple class="mt-1 w-full border rounded-md p-2 bg-white">
                <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG/WEBP, maks 4MB per file</p>
                @error('image_files.*') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

                {{-- Preview gambar baru (temporary) --}}
                @if ($image_files)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3">
                        @foreach ($image_files as $idx => $f)
                            <div class="relative">
                                <img src="{{ $f->temporaryUrl() }}" alt="preview"
                                     class="w-full h-28 object-cover rounded-md border">
                                <button type="button"
                                        wire:click="removeNewImage({{ $idx }})"
                                        class="absolute top-1 right-1 text-xs bg-white/90 border rounded px-2 py-0.5">
                                    Hapus
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Preview gambar yang sudah ada --}}
                @if ($existing_images && count($existing_images))
                    <div class="mt-4">
                        <div class="text-sm font-medium text-gray-700 mb-2">Gambar saat ini</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            @foreach ($existing_images as $i => $path)
                                <div class="relative">
                                    <img src="{{ asset('storage/'.$path) }}" alt="image"
                                         class="w-full h-28 object-cover rounded-md border">
                                    <button type="button"
                                            wire:click="removeExistingImage({{ $i }})"
                                            class="absolute top-1 right-1 text-xs bg-white/90 border rounded px-2 py-0.5">
                                        Hapus
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#433592] to-[#5B4B8A] text-white rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
