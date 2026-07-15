@section('title', 'Pengaturan Halaman Donasi & Transparansi')

<div class="space-y-8">
    @if (session()->has('message'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    {{-- Tabs Navigation --}}
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <button wire:click="setTab('settings')" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200 {{ $activeTab === 'settings' ? 'border-[#433592] text-[#433592]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Target & Testimoni
            </button>

            <button wire:click="setTab('impact')" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200 {{ $activeTab === 'impact' ? 'border-[#433592] text-[#433592]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Data Dampak Lingkungan
            </button>

            <button wire:click="setTab('allocation')" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200 {{ $activeTab === 'allocation' ? 'border-[#433592] text-[#433592]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Alokasi Donasi
            </button>

            <button wire:click="setTab('reports')" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200 {{ $activeTab === 'reports' ? 'border-[#433592] text-[#433592]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                Laporan PDF Bulanan
            </button>
        </nav>
    </div>

    {{-- TAB 1: Target & Testimoni --}}
    @if($activeTab === 'settings')
        <div class="space-y-8" x-transition>
            {{-- SETTINGS --}}
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Total & Target Donasi</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Total Donasi Terkumpul (Rp)</label>
                        <input type="number" step="0.01" wire:model.defer="total_amount" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                        @error('total_amount') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Target Donasi / Goal (Rp)</label>
                        <input type="number" step="0.01" wire:model.defer="goal_amount" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                        @error('goal_amount') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button wire:click="saveSettings" class="px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Simpan</button>
                </div>
            </div>

            {{-- LEADERBOARD (Top 3) --}}
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">Leaderboard Donasi</h2>
                        <p class="text-sm text-gray-500">Tiga peringkat teratas. Kelola lengkap di halaman Leaderboard.</p>
                    </div>
                    <a href="{{ route('admin.donation.leaderboard') }}" class="px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Kelola Leaderboard</a>
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
                    <a href="{{ route('admin.donation.testimonials') }}" class="px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Kelola Testimoni</a>
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
    @endif

    {{-- TAB 2: Data Dampak Lingkungan --}}
    @if($activeTab === 'impact')
        <div class="bg-white rounded-xl shadow-sm border p-6" x-transition>
            <div class="mb-6">
                <h2 class="text-lg font-semibold">Kelola Data Dampak Lingkungan</h2>
                <p class="text-sm text-gray-500">Statistik real-time yang akan dipublikasikan di Landing Page utama.</p>
            </div>
            
            <div class="grid sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Total Uang Dihemat (Rp)</label>
                    <input type="number" wire:model.defer="saved_money" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('saved_money') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Total Emisi CO2 Ditangkal (kg)</label>
                    <input type="number" wire:model.defer="co2_prevented" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('co2_prevented') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Total Limbah Dicegah (kg)</label>
                    <input type="number" wire:model.defer="waste_prevented" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('waste_prevented') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 text-right">
                <button wire:click="saveImpact" class="px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Simpan Data Dampak</button>
            </div>
        </div>
    @endif

    {{-- TAB 3: Alokasi Donasi --}}
    @if($activeTab === 'allocation')
        <div class="bg-white rounded-xl shadow-sm border p-6" x-transition>
            <div class="mb-6">
                <h2 class="text-lg font-semibold">Kelola Alokasi Penggunaan Donasi</h2>
                <p class="text-sm text-gray-500">Nilai nominal alokasi donasi dalam rupiah. Total pengeluaran donasi akan diakumulasikan otomatis pada Chart Keuangan.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Operasional (Rp)</label>
                    <input type="number" wire:model.defer="operational" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('operational') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Beli Barang (Rp)</label>
                    <input type="number" wire:model.defer="buy_goods" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('buy_goods') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Event (Rp)</label>
                    <input type="number" wire:model.defer="event" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('event') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Promosi (Rp)</label>
                    <input type="number" wire:model.defer="promotion" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('promotion') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Maintenance (Rp)</label>
                    <input type="number" wire:model.defer="maintenance" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('maintenance') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Lainnya (Rp)</label>
                    <input type="number" wire:model.defer="others" class="w-full border rounded-md px-3 py-2 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                    @error('others') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6 text-right">
                <button wire:click="saveAllocation" class="px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Simpan Alokasi</button>
            </div>
        </div>
    @endif

    {{-- TAB 4: Laporan PDF Bulanan --}}
    @if($activeTab === 'reports')
        <div class="grid lg:grid-cols-3 gap-8" x-transition>
            
            {{-- Form Upload --}}
            <div class="lg:col-span-1 bg-white rounded-xl shadow-sm border p-6 h-fit">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">Unggah Laporan PDF</h2>
                    <p class="text-sm text-gray-500">Maksimal ukuran file PDF adalah 5MB.</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Tahun Laporan</label>
                        <select wire:model.defer="report_year" class="w-full border rounded-md px-3 py-2 bg-white focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                            @for ($yr = date('Y') + 2; $yr >= 2020; $yr--)
                                <option value="{{ $yr }}">{{ $yr }}</option>
                            @endfor
                        </select>
                        @error('report_year') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Kuartal</label>
                        <select wire:model.defer="report_quarter" class="w-full border rounded-md px-3 py-2 bg-white focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                            <option value="I">Kuartal I (Jan - Mar)</option>
                            <option value="II">Kuartal II (Apr - Jun)</option>
                            <option value="III">Kuartal III (Jul - Sep)</option>
                            <option value="IV">Kuartal IV (Okt - Des)</option>
                        </select>
                        @error('report_quarter') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">File Dokumen (PDF)</label>
                        <input type="file" wire:model="report_file" class="w-full border rounded-md px-3 py-2 bg-gray-50 focus:ring-1 focus:ring-[#433592] focus:border-[#433592] outline-none">
                        @error('report_file') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button wire:click="uploadReport" class="w-full px-4 py-2 bg-[#433592] text-white rounded-lg hover:bg-[#3A2B7A] transition-colors">Unggah Laporan</button>
                </div>
            </div>

            {{-- Daftar Laporan --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border p-6">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">Daftar Laporan Keuangan Terdaftar</h2>
                    <p class="text-sm text-gray-500">Laporan yang terdaftar di bawah akan secara otomatis muncul sebagai link download di halaman frontend.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-3">Tahun</th>
                                <th class="px-4 py-3">Kuartal</th>
                                <th class="px-4 py-3">File Dokumen</th>
                                <th class="px-4 py-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reportsList as $report)
                                <tr class="border-b bg-white">
                                    <td class="px-4 py-3 font-semibold text-gray-900">{{ $report->year }}</td>
                                    <td class="px-4 py-3">{{ $report->quarter }}</td>
                                    <td class="px-4 py-3 text-blue-600">
                                        <a href="{{ asset('storage/' . $report->pdf_path) }}" target="_blank" class="hover:underline flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Lihat PDF
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <button wire:click="deleteReport({{ $report->id }})" class="text-red-600 hover:text-red-900 font-semibold">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada laporan diunggah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
