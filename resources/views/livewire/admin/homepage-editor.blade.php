@section('title', 'Editor Beranda')

<div>
    {{-- Notifikasi Sukses --}}
    @if (session()->has('message'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Editor Beranda Website</h1>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
            <a href="{{ route('home') }}" target="_blank"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Lihat Website →
            </a>
        </div>
    </div>

    {{-- Stats Cards (Ringkasan) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-sm border p-6">
            {{-- BARIS 28 (Perbaikan): Menggunakan $totalMediaPartners --}}
            <p class="text-sm text-gray-500">Partner Media Aktif</p>
            <p class="text-2xl font-bold">{{ $totalMediaPartners }} / 8</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Our Partner Aktif</p>
            <p class="text-2xl font-bold">{{ $totalOurPartners }} / 8</p>
        </div>
        
        {{-- Card stat lain untuk Hero/Visi --}}
        <div class="bg-white rounded-xl shadow-sm border p-6">
            <p class="text-sm text-gray-500">Section Hero</p>
            <p class="text-2xl font-bold">Aktif</p>
        </div>
    </div>

    {{-- Section Editor: Partner Media --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-10">
        <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Tampilan Press Release</h2>
            <a href="{{ route('admin.homepage.media-partners') }}"
               class="px-4 py-2 bg-[#433592] text-white rounded-lg">
                Kelola Detail →
            </a>
        </div>
        
        <div class="px-6 py-4 text-gray-700">
            <p class="mb-3">Logo-logo media/pers yang meliput Toko pinjam.</p>
            <p class="text-sm font-semibold">Status Saat Ini:</p>
            <div class="flex items-center gap-4 mt-2">
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-indigo-100 text-indigo-800 rounded-full">
                    {{ $totalMediaPartners }} Logo Terdaftar
                </span>
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-gray-100 text-gray-800 rounded-full">
                    Maks. 8 Slot
                </span>
            </div>
        </div>
    </div>
    
    {{-- Section Editor: OUR PARTNER BARU --}}
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-10">
        <div class="px-6 py-4 border-b bg-gray-50 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Tampilan Kerja Sama</h2>
            <a href="{{ route('admin.homepage.our-partners') }}"
               class="px-4 py-2 bg-[#433592] text-white rounded-lg">
                Kelola Detail →
            </a>
        </div>
        
        <div class="px-6 py-4 text-gray-700">
            <p class="mb-3">Logo-logo mitra atau sponsor utama yang mendukung Toko Pinjam.</p>
            <p class="text-sm font-semibold">Status Saat Ini:</p>
            <div class="flex items-center gap-4 mt-2">
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-indigo-100 text-indigo-800 rounded-full">
                    {{ $totalOurPartners }} Logo Terdaftar
                </span>
                <span class="inline-flex items-center px-3 py-1 text-sm font-medium bg-gray-100 text-gray-800 rounded-full">
                    Maks. 8 Slot
                </span>
            </div>
        </div>
    </div>
    {{-- END Section Editor: OUR PARTNER BARU --}}
</div>