{{-- TIDAK menambah script Alpine di sini jika sudah dimuat dari layout --}}

<div x-data="{
    activeTab: 'info',
    switchTab(tab) { this.activeTab = tab },
    counts: { savings: 0, environment: 0, shared: 0 },
    targets: {
        savings: {{ (int)($stats['savings'] ?? 0) }},
        environment: {{ (int)($stats['environment'] ?? 0) }},
        shared: {{ (int)($stats['shared'] ?? 0) }},
    },
    formatNumber(num) { return new Intl.NumberFormat('id-ID').format(num) },
    startCounting() {
        this.animateCount('savings', this.targets.savings);
        this.animateCount('environment', this.targets.environment);
        this.animateCount('shared', this.targets.shared);
    },
    animateCount(key, target) {
        const duration = 2000, frameRate = 60, totalFrames = Math.round(duration / (1000 / frameRate));
        let currentFrame = 0;
        const counter = setInterval(() => {
            currentFrame++;
            const progress = currentFrame / totalFrames;
            this.counts[key] = Math.round(target * progress);
            if (currentFrame >= totalFrames) { this.counts[key] = target; clearInterval(counter); }
        }, 1000 / frameRate);
    }
}">
    @section('title', 'Profil Pengguna')
    <livewire:components.navbar />

    <div class="bg-white min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-center text-lg font-medium mb-4 text-gray-800">
                Halo, {{ $user->full_name ?: $user->name }}
            </h2>

            <!-- Tabs -->
            <div class="flex justify-center mb-8 space-x-10 border-b border-purple-700">
                <button @click="switchTab('info')"
                        :class="activeTab === 'info' ? 'text-purple-700 border-b-4 border-purple-700' : 'text-gray-500 border-b-4 border-transparent hover:text-purple-700'"
                        class="pb-2 text-lg font-semibold">
                    Informasi profil
                </button>
                <button @click="switchTab('riwayat')"
                        :class="activeTab === 'riwayat' ? 'text-purple-700 border-b-4 border-purple-700' : 'text-gray-500 border-b-4 border-transparent hover:text-purple-700'"
                        class="pb-2 text-lg font-semibold">
                    Riwayat peminjaman
                </button>
            </div>

            <!-- Informasi Profil -->
            <div x-show="activeTab === 'info'" x-transition>
                @php
                    $fields = [
                        'Nama' => $user->full_name ?: $user->name,
                        'Jenis Kelamin' => $user->gender,
                        'Tanggal lahir' => optional($user->birth_date)->format('d F Y'),
                        'Alamat lengkap' => $user->address,
                        'No. WhatsApp' => $user->whatsapp_number,
                        'Jenjang Pendidikan' => $user->education_level,
                        'Universitas' => $user->university_name,
                        'Nomor Induk Mahasiswa (NIM)' => $user->nim,
                        'Asal Organisasi' => $user->organization_origin,
                    ];
                @endphp

                @foreach($fields as $label => $value)
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                        <input type="text" readonly value="{{ $value ?: '-' }}"
                               class="w-full bg-gray-300 text-gray-700 px-4 py-2 rounded" />
                    </div>
                @endforeach

                <div class="mt-6 text-sm text-center text-gray-600">
                    Ingin ajukan perubahan informasi?
                    <a href="#" class="text-purple-700 underline hover:text-purple-900">Kontak kami sekarang!</a>
                </div>

                <div class="mt-6 text-center">
                    <button class="bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800">
                        Kontak
                    </button>
                </div>
            </div>

            <!-- Riwayat Peminjaman -->
            <div x-show="activeTab === 'riwayat'" x-transition>
                <div class="mb-4">
                    <span class="text-sm font-medium text-gray-700">Halaman:</span>
                    <button class="bg-gray-300 px-2 py-1 rounded ml-2" disabled><</button>
                    <span class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded mx-1">1</span>
                    <button class="bg-gray-300 px-2 py-1 rounded">></button>
                </div>

                <div class="space-y-4">
                    @forelse($rentals as $rental)
                        @php
                            $first = is_array($rental->item->images ?? null) ? ($rental->item->images[0] ?? null) : null;
                            $img = $first
                                ? (Str::startsWith($first, ['http://','https://','/']) ? $first : asset('storage/'.$first))
                                : asset('images/barang/micTakara.png');
                        @endphp
                        <div class="bg-[#A5EBF8] p-4 rounded-lg flex items-center space-x-4">
                            <img src="{{ $img }}" class="w-16 h-16 object-cover" alt="{{ $rental->item->name }}">
                            <div>
                                <div class="font-bold text-purple-700">{{ $rental->item->name }}</div>
                                <div class="text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($rental->start_date)->format('d F Y') }}
                                    - {{ \Carbon\Carbon::parse($rental->end_date)->format('d F Y') }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500">Kamu belum punya riwayat peminjaman.</div>
                    @endforelse
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('pinjam-sekarang') }}" class="bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800">
                        Pinjam sekarang
                    </a>
                </div>

                <!-- Dampak Section -->
                <section x-intersect.once="startCounting()" class="bg-[#FFF5F1] mt-10 py-8 px-6 rounded-lg">
                    <h3 class="text-xl font-bold text-center text-purple-700 mb-6">Kamu Berdampak!</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-lg p-4 text-left">
                            <div class="text-sm font-bold text-gray-700">Uang Dihemat</div>
                            <div class="text-2xl font-bold">
                                Rp<span x-text="formatNumber(counts.savings)"></span>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Dari keputusan tidak membeli barang baru</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 text-left">
                            <div class="text-sm font-bold text-gray-700">Menjaga Lingkungan</div>
                            <div class="text-2xl font-bold">
                                <span x-text="counts.environment"></span>kg
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Sampah dicegah untuk berakhir di Tempat Pembuangan Akhir</p>
                        </div>
                        <div class="bg-white rounded-lg p-4 text-left">
                            <div class="text-sm font-bold text-gray-700">Berbagi Bersama</div>
                            <div class="text-2xl font-bold" x-text="counts.shared"></div>
                            <p class="text-sm text-gray-500 mt-1">Orang telah menggunakan barang yang kamu juga pakai</p>
                        </div>
                    </div>

                    <div class="text-center mt-6">
                        <p class="text-purple-700 font-medium">Buat lebih besar dampak</p>
                        <a href="{{ route('pinjam-sekarang') }}" class="mt-2 inline-block bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800">
                            Pinjam sekarang
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>
