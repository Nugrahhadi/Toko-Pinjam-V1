<div>
@section('title', 'Donasi - Toko Pinjam Indonesia')

<!-- Navbar -->
<livewire:components.navbar />

<!-- Hero Donasi -->
<section class="py-16 bg-[#fef7f5]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <div class="flex items-center gap-6">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-28 h-28">
            <div>
                <h1 class="text-2xl font-bold text-[#433592] mb-2">Toko Pinjam Indonesia</h1>
                <p class="text-gray-600 max-w-xl">Kami menghadirkan layanan pinjam murah untuk mahasiswa yang memberikan kabar gembira pada lingkungan.</p>
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-6 bg-[#433592] text-white px-6 py-2 rounded-xl">Donasi</button>
    </div>
</section>

<!-- Donasi Progress -->
<section class="bg-white py-16">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-[#433592]">
            <span id="donasiTotal">Rp0</span> telah terkumpul
        </h2>
        <div class="relative mt-6 h-4 bg-gray-200 rounded-full overflow-hidden">
            <div id="donasiProgress" class="h-4 bg-[#433592] w-0 transition-all duration-1000 ease-in-out"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-500 mt-1">
            <span>Rp0</span>
            <span>Rp1.000.000</span>
        </div>
    </div>
</section>

<!-- Slider Chapter -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center">
                    <h3 class="text-lg font-medium mb-2">Chapter I: Purwokerto</h3>
                    <img src="{{ asset('images/donasi/pwtt.jpg') }}" class="mx-auto rounded-lg shadow-md max-h-[400px] object-cover" />
                </div>
                <div class="swiper-slide text-center">
                    <h3 class="text-lg font-medium mb-2">Chapter II: ???</h3>
                    <div class="bg-black text-white py-24 px-6 rounded-lg">
                        <p class="text-4xl mb-4">???</p>
                        <p>Nantikan Toko Pinjam di Kota Kamu<br>Update di Instagram @tokopinjam</p>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

<!-- Insentif -->
<section class="bg-[#f8f9fc] py-16">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Insentif Donasi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <img src="{{ asset('images/donasi/1.png') }}" alt="Icon" class="w-16 h-16 mb-4">
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-3xl font-bold text-[#433592]">Rp100.000</p>
                <p class="text-[#433592] mt-2 font-semibold">Nama tercantum di list leaderboard</p>
            </div>
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <img src="{{ asset('images/donasi/2.png') }}" alt="Icon" class="w-16 h-16 mb-4">
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-3xl font-bold text-[#433592]">Rp50.000</p>
                <p class="text-[#433592] mt-2 font-semibold">Pesan tercantum di running text website</p>
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-6 bg-[#433592] text-white px-6 py-2 rounded-xl">Donasi</button>
    </div>
</section>

<!-- Donatur Teratas -->
<section class="py-16 bg-[#FFF0E1]">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Donatur Teratas</h2>
        <div class="grid grid-cols-1 gap-6 mb-10">
            @for ($i = 1; $i <= 3; $i++)
                <div class="relative flex items-center bg-[#f3f3fd] p-4 rounded-lg shadow-sm gap-4 max-w-md mx-auto">
                    @if($i === 1)
                        <img src="{{ asset('images/donasi/mahkota.png') }}" class="absolute -top-3 left-3 w-6 h-6 z-10" alt="Mahkota">
                    @endif
                    <div class="absolute -top-3 -left-3 bg-white border-2 border-[#433592] w-8 h-8 flex items-center justify-center rounded-full text-[#433592] font-bold z-20">{{ $i }}</div>
                    <img src="{{ asset('images/user.jpg') }}" class="w-10 h-10 rounded-full z-0" />
                    <div class="text-left">
                        <p class="font-semibold text-[#433592]">Rafiif Nur Tahta Bagaskara</p>
                        <p class="text-gray-700">Rp4.000.000</p>
                    </div>
                </div>
            @endfor
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
            @for ($i = 4; $i <= 13; $i++)
                <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                    <div class="text-[#433592] font-bold">{{ $i }}</div>
                    <img src="{{ asset('images/user.jpg') }}" class="w-8 h-8 rounded-full" />
                    <div class="text-left text-sm">
                        <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur Tahta Bagaskara</p>
                        <p class="text-gray-700 leading-tight">Rp4.000.000</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#433592] mb-6">Apa Kata Mereka</h2>
        <p class="text-sm text-gray-500 mb-8">(Diperbarui setiap 3 bulan)</p>
        <div class="swiper-container-testimoni">
            <div class="gap-8 swiper-wrapper">
                @for ($i = 0; $i < 4; $i++)
                    <div class="swiper-slide min-w-[300px] bg-[#433592] text-white p-6 max-w-md rounded-xl shadow">
                        <p class="italic mb-4">"Nyanyian ini bukan sekedar nada, aku ingin kau mendengarnya, dengan hatimu bukan telinga."</p>
                        <p class="font-semibold">Muhammad Arga Aryantara</p>
                    </div>
                @endfor
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-8 bg-[#433592] text-white px-6 py-2 rounded-xl">Donasi</button>
    </div>
</section>

<!-- Footer -->
<livewire:components.footer />

<!-- Swiper & Donasi Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Donasi count animation
        let targetAmount = 500000;
        let current = 0;
        let duration = 2000;
        let step = targetAmount / (duration / 10);
        const counter = document.getElementById('donasiTotal');
        const progress = document.getElementById('donasiProgress');
        const interval = setInterval(() => {
            current += step;
            if (current >= targetAmount) {
                current = targetAmount;
                clearInterval(interval);
            }
            counter.textContent = 'Rp' + Math.floor(current).toLocaleString();
            progress.style.width = (current / 1000000 * 100) + '%';
        }, 10);

        // Swiper untuk Chapter
        new Swiper('.swiper-container', {
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });

        // Swiper untuk Testimoni
        new Swiper('.swiper-container-testimoni', {
            slidesPerView: 1,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
        });
    });
</script>

</div>