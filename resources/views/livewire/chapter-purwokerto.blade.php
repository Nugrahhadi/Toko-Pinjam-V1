<div>
    @livewire('components.navbar')

    <div class="bg-white py-8">
        <div class="relative bg-cover bg-center bg-no-repeat min-h-[500px] py-24"
             style="background-image: url('{{ asset('images/landmark.JPG') }}');">

            <a href="https://www.tokopinjam.com/purwokerto"
               class="absolute inset-0 z-10"
               aria-label="Link ke tokopinjam Purwokerto"></a>

            <div class="absolute inset-0 bg-purple-900 opacity-50 z-0"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center z-20 pointer-events-none">
                <div class="w-full mt-10 md:w-2/3 md:ml-auto md:pl-20 text-center md:text-left text-white">

                    <h1 class="text-3xl md:text-5xl font-extrabold mb-4"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('Toko Pinjam Telah Hadir di Purwokerto!') }}
                    </h1>

                    <p class="text-base md:text-lg mb-6 max-w-xl">
                        {{ __('Butuh barang apa hari ini?') }}
                    </p>

                    <div class="flex flex-wrap gap-4 justify-center md:justify-start mb-6 pointer-events-auto">
                        <a href="{{ route('register.custom') }}" class="inline-flex items-center gap-2 bg-white text-purple-900 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition">
                            Register
                        </a>
                        <a href="{{ route('login.custom') }}" class="inline-flex items-center gap-2 bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-purple-900 transition">
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

                    <div class="pointer-events-auto">
                        <p class="text-sm mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ __('Berkolaborasi dengan:') }}
                        </p>
                        <div class="flex gap-0 justify-center md:justify-start items-center">
                            <img src="{{ asset('images/purwokerto/Maggenzim.png') }}" alt="Maggenzim" class="h-16 w-auto">
                            <img src="{{ asset('images/purwokerto/voluntiiran-pwt.png') }}" alt="Voluntiiran Purwokerto" class="h-16 w-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-lg text-[#433592] mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ __('Fakta menarik:') }}
            </h3>
            <p class="text-xl md:text-3xl font-extrabold text-[#433592] mb-4 leading-normal" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ __('Kalau kamu beli tenda seharga Rp300.000 dan hanya dipakai 3 kali, berarti kamu menghabiskan Rp100.000 setiap kali pakai.') }}
            </p>
            <p class="text-xl md:text-3xl font-extrabold text-orange-500 mb-8 leading-normal" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ __('Di Toko Pinjam, cukup bayar Rp25.000 saja!') }}
            </p>
        </div>
    </section>

    <section class="py-16 bg-[#faf0eb]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center mb-12">
                <div class="bg-gray-100 rounded-lg p-1 flex w-full max-w-md">
                    <button 
                        wire:click="setActiveTab('lokasi')"
                        class="flex-1 px-4 py-3 rounded-lg font-semibold transition-all duration-500 ease-in-out transform {{ $activeTab === 'lokasi' ? 'bg-[#433592] text-white shadow-lg scale-105' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-200' }}"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('📍 Lokasi Station') }}
                    </button>
                    <button 
                        wire:click="setActiveTab('jam')"
                        class="flex-1 px-4 py-3 rounded-lg font-semibold transition-all duration-500 ease-in-out transform {{ $activeTab === 'jam' ? 'bg-[#433592] text-white shadow-lg scale-105' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-200' }}"
                        style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('🕐 Jam Buka') }}
                    </button>
                </div>
            </div>

            <div class="transition-all duration-500 ease-in-out transform">
                @if($activeTab === 'lokasi')
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-3xl font-bold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            {{ __('Purwokerto Sudah Hadir!') }}
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-lg font-semibold text-gray-800">{{ __('Purwokerto - Sudah Beroperasi') }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">{{ __('Surabaya - Segera Hadir') }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">{{ __('Yogyakarta - Segera Hadir') }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">{{ __('Jakarta - Segera Hadir') }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-lg text-gray-600">{{ __('Bandung - Segera Hadir') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="bg-gradient-to-br from-[#433592] to-[#6B46C1] p-8 rounded-2xl shadow-xl text-white text-center">
                            <h4 class="text-2xl font-bold mb-4">{{ __('📍 Station Purwokerto') }}</h4>
                            <p class="text-lg">{{ __('Jl. Raya Klapasawit No.18') }}</p>
                            <p class="text-lg">{{ __('Dusun 2, Kalimanah Kulon') }}</p>
                            <p class="text-lg">{{ __('Kec. Kalimanah, Purbalingga') }}</p>
                            <p class="text-lg">{{ __('Jawa Tengah 53371') }}</p>
                        </div>
                    </div>
                </div>
                @else

                    <div class="md:flex">
                        <div class="md:w-3/5 p-8 flex flex-col justify-center">
                            <div class="space-y-6">
                                <p class="text-gray-600 text-lg leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    {{ __('Kamu harus mengajukan peminjaman melalui website ini, lalu mengambil dan mengembalikan barang di jam berikut:') }}
                                </p>
                                
                                <div class="space-y-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Senin') }}</span>
                                            <span class="text-gray-700 text-lg">09.00 - 15.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Selasa') }}</span>
                                            <span class="text-gray-700 text-lg">09.00 - 15.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Rabu') }}</span>
                                            <span class="text-gray-700 text-lg">09.00 - 15.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Kamis') }}</span>
                                            <span class="text-gray-700 text-lg">09.00 - 15.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Jumat') }}</span>
                                            <span class="text-gray-700 text-lg">09.00 - 15.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Sabtu') }}</span>
                                            <span class="text-gray-700 text-lg">11.00 - 17.00</span>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3">
                                        <div class="flex justify-between items-center w-full py-2 border-b border-gray-200">
                                            <span class="font-semibold text-[#433592] text-lg">{{ __('Minggu') }}</span>
                                            <span class="text-gray-700 text-lg">11.00 - 17.00</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                    <p class="text-red-600 font-semibold text-lg" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                        {{ __('⚠️ Hari libur nasional dan hari raya keagamaan = Libur') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-2/5 p-6">
                            <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-2xl p-4 relative overflow-hidden" style="aspect-ratio: 4/5;">
                                <img src="{{ asset('images/MenaraTeratai.png') }}" 
                                     alt="Landmark Purwokerto" 
                                     class="w-full h-full object-cover rounded-xl shadow-lg transition-all duration-500">

                                <div class="absolute bottom-4 left-4 right-4 bg-black/50 backdrop-blur-sm rounded-lg p-3">
                                    <p class="text-white font-semibold text-base">{{ __('📍 Station Purwokerto') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {{ __('Dari Kami, Melalui Mereka, Untuk Purwokerto') }}
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('Maggenzim memiliki visi yang sama dengan Toko Pinjam Purwokerto, yaitu sama-sama ingin mengurangi emisi gas rumah kaca melalui inovasi dan cara-cara yang lebih berkelanjutan.') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('Toko Pinjam hadir untuk memberikan solusi bagi masyarakat yang membutuhkan barang hanya untuk penggunaan sesaat, sehingga mengurangi kebutuhan akan kepemilikan barang yang berkontribusi pada penumpukan sampah dan emisi karbon.') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        {{ __('Dari kesamaan visi inilah, Maggenzim berkolaborasi dengan Toko Pinjam sebagai upaya dalam mendukung gerakan keberlanjutan lingkungan dan reduksi emisi gas rumah kaca di Purwokerto.') }}
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/purwokerto/Maggenzim-TokoPinjam.jpg') }}" alt="Maggenzim Toko Pinjam" class="max-w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <livewire:components.how-it-works />

    <livewire:components.cheapest-price />

    <livewire:components.manfaat-pinjam />

    @livewire('components.footer')
</div>
