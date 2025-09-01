@section('title', 'Pengaturan Halaman Donasi')

<div class="space-y-8">
    @if (session()->has('message'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    {{-- SETTINGS --}}
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Total & Target Donasi</h2>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-700">Total Donasi (Rp)</label>
                <input type="number" step="0.01" wire:model.defer="total_amount" class="w-full border rounded-md px-3 py-2">
                @error('total_amount') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700">Target Donasi / Goal (Rp)</label>
                <input type="number" step="0.01" wire:model.defer="goal_amount" class="w-full border rounded-md px-3 py-2">
                @error('goal_amount') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="mt-4 text-right">
            <button wire:click="saveSettings" class="px-4 py-2 bg-[#433592] text-white rounded-lg">Simpan</button>
        </div>
    </div>

    {{-- LEADERBOARD (Top 3) --}}
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold">Leaderboard Donasi</h2>
                <p class="text-sm text-gray-500">Tiga peringkat teratas. Kelola lengkap di halaman Leaderboard.</p>
            </div>
            <a href="{{ route('admin.donation.leaderboard') }}" class="px-4 py-2 bg-[#433592] text-white rounded-lg">Kelola Leaderboard</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            @forelse($top3 as $i => $row)
                <div class="border rounded-lg p-4 bg-white">
                    <div class="text-sm text-gray-500 mb-1">#{{ $row->position ?? ($i+1) }}</div>
                    <div class="text-lg font-semibold text-[#433592]">
                        {{ $row->display_name ?: ($row->user->full_name ?? $row->user->name ?? 'Anonim') }}
                    </div>
                    <div class="mt-1 text-gray-700">Rp{{ number_format($row->amount, 0, ',', '.') }}</div>
                </div>
            @empty
                <p class="text-gray-500 mt-4">Belum ada data leaderboard.</p>
            @endforelse
        </div>
    </div>

    {{-- TESTIMONI (5 terakhir) --}}
    <div class="bg-white rounded-xl shadow-sm border p-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold">Testimoni</h2>
                <p class="text-sm text-gray-500">Menampilkan 5 testimoni terakhir yang disetujui.</p>
            </div>
            <a href="{{ route('admin.donation.testimonials') }}" class="px-4 py-2 bg-[#433592] text-white rounded-lg">Kelola Testimoni</a>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($latest5 as $t)
                <div class="border rounded-lg p-4 bg-white">
                    <div class="text-sm text-gray-500 mb-1">{{ $t->display_label }}</div>
                    <div class="text-gray-800">{{ $t->message }}</div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada testimoni.</p>
            @endforelse
        </div>
    </div>
</div>
