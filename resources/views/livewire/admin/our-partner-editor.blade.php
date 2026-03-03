@section('title', 'Kelola Our Partner')

<div>
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Our Partner</h1>
            <p class="text-gray-600">Atur logo, tautan, dan urutan partner di halaman beranda.</p>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
            <a href="{{ route('admin.homepage.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                ← Beranda Editor
            </a>
            <button wire:click="$set('showAddModal', true)"
               class="px-4 py-2 bg-gradient-to-r from-[#433592] to-[#5B4B8A] text-white rounded-lg">
                + Tambah Partner
            </button>
        </div>
    </div>

    {{-- Stats Cards (Ringkasan) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Total Partner Aktif</p>
            <p class="text-2xl font-bold">{{ $partners->count() }}</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6 md:col-span-2">
            <p class="text-sm text-gray-500">Info Tampilan</p>
            <p class="text-base font-semibold text-gray-900">Maksimal 8 partner akan tampil dan *looping* di beranda.</p>
        </div>
    </div>

    {{-- Daftar Partner (Dengan fitur Drag & Drop/Reorder) --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-10">
        <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Urutan & Daftar Partner (Drag & Drop untuk Mengubah Urutan)</h2>
            <button wire:click="$set('showAddModal', true)"
               class="px-3 py-1.5 text-sm bg-[#433592] text-white rounded-md">
                + Tambah Partner
            </button>
        </div>
        
        <div class="p-6">
            <div id="partner-sortable-list" class="space-y-3">
                @forelse ($partners as $partner)
                    <div class="flex items-center p-3 border rounded-lg bg-gray-50 hover:bg-white transition" 
                         data-id="{{ $partner->id }}" wire:key="partner-{{ $partner->id }}">
                        
                        <button type="button" class="drag-handle cursor-move text-gray-400 hover:text-gray-600 mr-3" title="Drag untuk pindah">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        
                        <div class="w-12 h-12 flex items-center justify-center border rounded-md p-1 bg-white mr-4 flex-shrink-0">
                            {{-- AKSES LOGO DENGAN PATH RELATIF + asset('storage/') --}}
                            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="Logo {{ $partner->name }}" class="max-w-[80%] max-h-[80%] object-contain" />
                        </div>
                        
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 truncate">{{ $partner->name }} (Posisi: {{ $partner->position }})</p>
                            <a href="{{ $partner->url ?? '#' }}" target="_blank" class="text-sm text-blue-600 truncate hover:underline">{{ $partner->url ?? 'Tidak ada URL' }}</a>
                        </div>
                        
                        <div class="ml-4 flex space-x-2 flex-shrink-0">
                            <button wire:click="editPartner({{ $partner->id }})" class="text-[#433592] hover:underline" title="Edit">
                                Edit
                            </button>
                            <button 
                                onclick="confirm('Yakin ingin menghapus partner ini?') || event.stopImmediatePropagation()" 
                                wire:click="removePartner({{ $partner->id }})" 
                                class="text-red-600 hover:underline" 
                                title="Hapus">
                                Hapus
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="px-6 py-6 text-center text-gray-500">Belum ada partner yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>


    {{-- ------------------------------------------------ --}}
    {{-- MODAL TAMBAH PARTNER BARU --}}
    {{-- ------------------------------------------------ --}}
    @if($showAddModal)
        <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="$set('showAddModal', false)">
            <div class="bg-white w-full max-w-md rounded-xl p-6" wire:click.stop>
                <h3 class="text-xl font-bold mb-4">Tambah Partner Baru</h3>
                
                <form wire:submit.prevent="addPartner" class="space-y-4">
                    <div>
                        <label for="partnerName" class="block text-sm font-medium text-gray-700">Nama Partner</label>
                        <input type="text" id="partnerName" wire:model="newPartner.name" 
                               class="mt-1 w-full border rounded-md p-2">
                        @error('newPartner.name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="partnerUrl" class="block text-sm font-medium text-gray-700">URL Website (Opsional)</label>
                        <input type="url" id="partnerUrl" wire:model="newPartner.url" 
                               class="mt-1 w-full border rounded-md p-2">
                        @error('newPartner.url') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="partnerLogo" class="block text-sm font-medium text-gray-700">Logo Partner (Maks 1MB, PNG/JPG)</label>
                        <input type="file" id="partnerLogo" wire:model="newPartner.logo" 
                               class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#433592] file:text-white hover:file:bg-[#5B4B8A]">
                        @error('newPartner.logo') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

                        @if ($newPartner['logo'])
                            <p class="text-xs text-gray-500 mt-2">Pratinjau:</p>
                            <img src="{{ $newPartner['logo']->temporaryUrl() }}" class="w-16 h-16 object-contain border rounded p-1 mt-1">
                        @endif
                    </div>
                    
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" wire:click="$set('showAddModal', false)" class="px-4 py-2 rounded-md border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-md bg-[#433592] text-white">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- ------------------------------------------------ --}}
    {{-- MODAL EDIT PARTNER --}}
    {{-- ------------------------------------------------ --}}
    @if ($partnerToEditId)
    <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50" wire:click="$set('partnerToEditId', null)">
        <div class="bg-white w-full max-w-md rounded-xl p-6" wire:click.stop>
            <h3 class="text-xl font-bold mb-4">Edit Partner</h3>
            
            <form wire:submit.prevent="updatePartner" class="space-y-4">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-700">Nama Partner</label>
                    <input type="text" id="editName" wire:model="partnerToEdit.name" 
                           class="mt-1 w-full border rounded-md p-2">
                    @error('partnerToEdit.name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="editUrl" class="block text-sm font-medium text-gray-700">URL Website (Opsional)</label>
                    <input type="url" id="editUrl" wire:model="partnerToEdit.url" 
                           class="mt-1 w-full border rounded-md p-2">
                    @error('partnerToEdit.url') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="editLogo" class="block text-sm font-medium text-gray-700">Ganti Logo Partner (Maks 1MB)</label>
                    <input type="file" id="editLogo" wire:model="logoUpload" 
                           class="mt-1 w-full text-sm text-gray-500 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#433592] file:text-white hover:file:bg-[#5B4B8A]">
                    @error('logoUpload') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    
                    <p class="text-xs text-gray-500 mt-2">Logo Saat Ini:</p>
                    @if ($logoUpload)
                        <img src="{{ $logoUpload->temporaryUrl() }}" alt="Preview Baru" class="w-16 h-16 object-contain border rounded p-1 mt-1">
                    @else
                        @if (isset($partnerToEdit['logo_path']))
                            <img src="{{ asset('storage/' . $partnerToEdit['logo_path']) }}" alt="Logo saat ini" class="w-16 h-16 object-contain border rounded p-1 mt-1">
                        @endif
                    @endif
                </div>
                
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" wire:click="$set('partnerToEditId', null)" class="px-4 py-2 rounded-md border">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded-md bg-[#433592] text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

<script>
/**
 * Inisialisasi SortableJS pada list partner media
 */
function initPartnerSortable() {
    const list = document.getElementById('partner-sortable-list');
    if (!list || list.dataset.sortableInit === '1') return;
    list.dataset.sortableInit = '1';

    new Sortable(list, {
        animation: 150,
        handle: '.drag-handle',
        ghostClass: 'bg-indigo-100',
        onEnd: function (evt) {
            const order = Array.from(list.querySelectorAll('[data-id]'))
                .map((el, index) => ({ 
                    value: el.dataset.id, 
                    order: index + 1
                }));
            
            @this.call('reorder', order);
        }
    });
}

document.addEventListener('livewire:load', initPartnerSortable);
document.addEventListener('livewire:navigated', initPartnerSortable);
document.addEventListener('livewire:initialized', () => {
    if (window.Livewire) {
        Livewire.hook('message.processed', initPartnerSortable);
    }
});
</script>
@endpush