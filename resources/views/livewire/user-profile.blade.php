<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="{
    activeTab: 'info',
    switchTab(tab) {
        this.activeTab = tab;
    },
    counts: { savings: 0, environment: 0, shared: 0 },
    formatNumber(num) {
        return new Intl.NumberFormat('id-ID').format(num);
    },
    startCounting() {
        this.animateCount('savings', 100000);
        this.animateCount('environment', 100);
        this.animateCount('shared', 30);
    },
    animateCount(key, target) {
        const duration = 2000;
        const frameRate = 60;
        const totalFrames = Math.round(duration / (1000 / frameRate));
        let currentFrame = 0;

        const counter = setInterval(() => {
            currentFrame++;
            const progress = currentFrame / totalFrames;
            this.counts[key] = Math.round(target * progress);
            if (currentFrame >= totalFrames) {
                this.counts[key] = target;
                clearInterval(counter);
            }
        }, 1000 / frameRate);
    }
}">

    @section('title', 'Profil Pengguna')
    <livewire:components.navbar />

    <div class="bg-white min-h-screen py-10">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-center text-lg font-medium mb-4 text-gray-800">
                Halo, Rafiif Nur Tahta Bagaskara
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
                @foreach([
                    'Nama' => 'Rafiif Nur Tahta Bagaskara',
                    'Jenis Kelamin' => 'Laki-laki',
                    'Tanggal lahir' => '18 November 2004',
                    'Alamat lengkap' => '282 Parliament Street, Toronto',
                    'No. WhatsApp' => '082122270150',
                    'Jenjang Pendidikan' => 'S1',
                    'Universitas' => 'University of Toronto',
                    'Nomor Induk Mahasiswa (NIM)' => '1010121093',
                    'Asal Organisasi' => 'Permika Toronto'
                ] as $label => $value)
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                        <input type="text" readonly value="{{ $value }}"
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
                    @foreach(range(1, 5) as $i)
                        <div class="bg-[#A5EBF8] p-4 rounded-lg flex items-center space-x-4">
                            <img src="{{ asset('images/barang/micTakara.png') }}" class="w-16 h-16 object-cover" alt="Mic">
                            <div>
                                <div class="font-bold text-purple-700">Microphone Wireless Takara</div>
                                <div class="text-sm text-gray-700">25 Agustus 2025 - 27 Agustus 2025</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-6">
                    <button class="bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800">
                        Pinjam sekarang
                    </button>
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
                        <button class="mt-2 bg-purple-700 text-white px-6 py-2 rounded hover:bg-purple-800">
                            Pinjam sekarang
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <livewire:components.footer />
</div>
