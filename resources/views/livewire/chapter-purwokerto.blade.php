<div>
    <!-- Import Navbar -->
    @livewire('components.navbar')

    <!-- HERO SECTION -->
    <div class="bg-white py-8">
        <div class="relative bg-cover bg-center bg-no-repeat min-h-[500px] py-24"
             style="background-image: url('{{ asset('images/landmark.jpg') }}');">

            <!-- Link yang melapisi seluruh area, tapi tidak menghalangi konten -->
            <a href="https://www.tokopinjam.com/purwokerto"
               class="absolute inset-0 z-10"
               aria-label="Link ke tokopinjam Purwokerto"></a>

            <!-- Overlay Ungu Semi Transparan -->
            <div class="absolute inset-0 bg-purple-900 opacity-50 z-0"></div>

            <!-- Konten Hero -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center z-20 pointer-events-none">
                <div class="w-full mt-10 md:w-2/3 md:ml-auto md:pl-20 text-center md:text-left text-white">

                    <h1 class="text-3xl md:text-5xl font-extrabold mb-4"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Toko Pinjam Telah Hadir di Purwokerto!
                    </h1>

                    <p class="text-base md:text-lg mb-6 max-w-xl">
                        Butuh barang apa hari ini?
                    </p>

                    <!-- Tombol Register, Login, dan Instagram -->
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start mb-6 pointer-events-auto">
                        <a href="#" class="inline-flex items-center gap-2 bg-white text-purple-900 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition">
                            Register
                        </a>
                        <a href="#" class="inline-flex items-center gap-2 bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-purple-900 transition">
                            Login
                        </a>
                        <a href="https://www.instagram.com/tokopinjam.purwokerto/" target="_blank"
                           class="inline-flex items-center gap-2 bg-white text-purple-900 font-semibold px-4 py-2 rounded-full shadow hover:bg-gray-100 transition relative z-30 pointer-events-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                                <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2.25a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-1.5 0v-.008a.75.75 0 0 1 .75-.75ZM12 7a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm0 1.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7Z"/>
                            </svg>
                            @tokopinjam.purwokerto
                        </a>
                    </div>

                    <!-- Alamat: dibungkus agar tetap bisa diklik & selectable -->
                    <p class="text-base md:text-lg mb-6 max-w-xl pointer-events-auto">
                        📍 Jl. Raya Klapasawit No.18, Dusun 2, Kalimanah Kulon, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371
                    </p>

                    <!-- Berkolaborasi dengan -->
                    <div class="pointer-events-auto">
                        <p class="text-sm mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Berkolaborasi dengan:
                        </p>
                        <div class="flex justify-center md:justify-start">
                            <img src="{{ asset('images/logo-toko-pinjam.png') }}" alt="Toko Pinjam Logo" class="h-12 w-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAKTA MENARIK SECTION -->
    <section class="bg-[#faf0eb] py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-lg text-[#433592] mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Fakta menarik:
            </h3>
            <p class="text-lg md:text-xl text-[#433592] font-semibold mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Kalau kamu beli tenda seharga Rp300.000 dan hanya dipakai 3 kali, berarti kamu menghabiskan Rp100.000 setiap kali pakai.
            </p>
            <p class="text-lg md:text-xl text-[#433592] font-bold" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Di Toko Pinjam, cukup bayar Rp25.000 saja!
            </p>
        </div>
    </section>

    <!-- LOKASI & JAM BUKA SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tab Navigation -->
            <div class="flex justify-center mb-12">
                <div class="bg-gray-100 rounded-lg p-1 flex">
                    <button 
                        wire:click="setActiveTab('lokasi')"
                        class="px-6 py-3 rounded-lg font-semibold transition-all {{ $activeTab === 'lokasi' ? 'bg-[#433592] text-white' : 'text-gray-600 hover:text-gray-800' }}"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        📍 Lokasi Station
                    </button>
                    <button 
                        wire:click="setActiveTab('jam')"
                        class="px-6 py-3 rounded-lg font-semibold transition-all {{ $activeTab === 'jam' ? 'bg-[#433592] text-white' : 'text-gray-600 hover:text-gray-800' }}"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        🕐 Jam Buka
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="transition-all duration-300">
                @if($activeTab === 'lokasi')
                <!-- Lokasi Station Content -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-3xl font-bold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Purwokerto Sudah Hadir!
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-lg font-semibold text-gray-800">Purwokerto - Sudah Beroperasi</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">Surabaya - Segera Hadir</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">Yogyakarta - Segera Hadir</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">Jakarta - Segera Hadir</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">Bandung - Segera Hadir</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Kamu harus mengajukan peminjaman melalui website ini, lalu mengambil dan mengembalikan barang di jam berikut:
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div class="bg-gradient-to-br from-[#433592] to-[#6B46C1] p-8 rounded-2xl shadow-xl text-white text-center">
                            <h4 class="text-2xl font-bold mb-4">📍 Station Purwokerto</h4>
                            <p class="text-lg">Jl. Raya Klapasawit No.18</p>
                            <p class="text-lg">Dusun 2, Kalimanah Kulon</p>
                            <p class="text-lg">Kec. Kalimanah, Purbalingga</p>
                            <p class="text-lg">Jawa Tengah 53371</p>
                        </div>
                    </div>
                </div>
                @else
                <!-- Jam Buka Content -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-gray-600 mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Kamu harus mengajukan peminjaman melalui website ini, lalu mengambil dan mengembalikan barang di jam berikut:
                        </p>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Senin</span>
                                <span class="text-gray-700">09.00 - 15.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Selasa</span>
                                <span class="text-gray-700">09.00 - 15.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Rabu</span>
                                <span class="text-gray-700">09.00 - 15.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Kamis</span>
                                <span class="text-gray-700">09.00 - 15.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Jumat</span>
                                <span class="text-gray-700">09.00 - 15.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Sabtu</span>
                                <span class="text-gray-700">11.00 - 17.00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-semibold text-[#433592]">Minggu</span>
                                <span class="text-gray-700">11.00 - 17.00</span>
                            </div>
                        </div>
                        
                        <p class="text-red-600 font-semibold mt-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Tanggal merah dan hari raya keagamaan = Libur
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/landmark-sectionpwt.JPG') }}" alt="Landmark Purwokerto" class="rounded-2xl shadow-xl max-w-full h-auto">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- DARI KAMI SECTION -->
    <section class="py-16 bg-[#faf0eb]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Dari Kami, Melalui Mereka, Untuk Purwokerto
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/footerlogo.png') }}" alt="Footer Logo" class="max-w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- AKU MAU PINJAM SECTION -->
    @livewire('components.butuh-bantuan')

    <!-- BARANG YANG UMUMNYA DIPINJAM -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl text-[#433592] mb-6" style="font-weight: 800; font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Kami Menjamin Harga Termurah
                </h2>
                <p class="text-lg text-[#433592] max-w-3xl mx-auto leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Tidak perlu lagi mengeluarkan ratusan hingga jutaan rupiah hanya untuk barang yang dipakai jarang-jarang. 
                    Mulai dari 10 Ribu, kamu bisa pinjam dan pakai barang-barang ini. Dengan begitu, sisa uang kamu bisa dipakai 
                    untuk keperluan yang lain!
                </p>
            </div>

            <!-- Items Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 lg:gap-6">
                @foreach($this->getDisplayedItems() as $index => $item)
                <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                        <!-- Image rasio 1:1 -->
                        <div class="aspect-square overflow-hidden bg-gray-50">
                            <img src="{{ asset('images/barang/' . $item['image']) }}" 
                                 alt="{{ $item['name'] }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        
                        <!-- Content -->
                        <div class="p-3 lg:p-4">
                            <div class="mb-2">
                                <span class="inline-block px-2 py-1 text-xs font-medium text-[#433592] bg-[#FDF2EB] rounded-full" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ $item['category'] }}
                                </span>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                {{ $item['name'] }}
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-base lg:text-lg font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    Rp {{ $item['price'] }}
                                </span>
                                <span class="text-xs text-gray-500" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    per hari
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-12">
                <a href="{{ route('all-items') }}" class="inline-flex items-center px-8 py-4 bg-[#433592] text-white font-semibold rounded-lg hover:bg-[#3A2B7A] transition-colors" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                    Lihat Semua Barang
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- KEUNTUNGAN MEMINJAM SECTION -->
    @livewire('components.kenapa-pinjam')

    <!-- FOOTER -->
    @livewire('components.footer')
</div>
