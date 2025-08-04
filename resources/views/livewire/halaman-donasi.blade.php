<div>
    <livewire:components.navbar />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Toko Pinjam Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <style>
        /* Custom styles for slider buttons */
        .swiper-button-next,
        .swiper-button-prev {
            color: #433592;
            background: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
            font-weight: bold;
        }
        
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: #433592;
            color: white;
        }
        
        /* Testimonial slider specific styles */
        .swiper-container-testimoni .swiper-slide {
            display: flex;
            justify-content: center;
            height: auto;
        }
        
        /* Fixed height for testimonial cards */
        .testimonial-card {
            height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<!-- Hero Donasi -->
<section class="py-16 bg-[#fef7f5]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <div class="flex items-center gap-6">
            <div class="w-28 h-28 rounded-full overflow-hidden">
                <img src="images/donasi/logo.png" alt="Toko Pinjam Indonesia Logo" class="w-full h-full object-cover">
            </div>
            <div>
                <h1 class="text-4xl font-bold text-[#433592] mb-2">Toko Pinjam Indonesia</h1>
                <p class="text-gray-600 max-w-xl">Kami menghadirkan layanan pinjam murah untuk mahasiswa yang memberikan kabar gembira pada lingkungan.</p>
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-12 bg-[#433592] text-white px-6 py-2 rounded-xl hover:bg-[#3a2d7a] transition-colors">Donasi</button>
    </div>
</section>

<!-- Donasi Progress -->
<section class="bg-white py-16">
    <div class="max-w-4xl mx-auto text-center px-4">
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

 <div class="bg-[#9be1eb] justify-center items-center">
          <div class="pt-8 pb-8 text-center">
            <h3 class="whitespace-nowrap text-2xl md:text-2xl font-extrabold text-[#413291] mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
              Kamu berhak tahu untuk apa donasimu digunakan
            </h3>
            <a href="{{ route('laporan-keuangan') }}" target="_blank"
               class="inline-block bg-[#413291] text-white font-semibold px-6 py-3 rounded hover:bg-[#2e2367] transition">
              Laporan Keuangan
            </a>
          </div>
    </div>

<!-- Slider Chapter -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="swiper-container chapter-slider relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center">
                    <h3 class="text-lg font-medium mb-4">Chapter I: Purwokerto</h3>
                    <div class="bg-gray-200 rounded-lg shadow-md h-[400px] overflow-hidden">
                        <img src="images/donasi/pwtt.jpg" alt="Chapter I Purwokerto" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="swiper-slide text-center">
                    <h3 class="text-lg font-medium mb-4">Chapter II: ???</h3>
                    <div class="bg-black text-white py-24 px-6 rounded-lg h-[400px] flex flex-col items-center justify-center">
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
<section class="bg-white py-16">
    <div class="max-w-5xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Insentif Donasi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-[#FFF0E1] shadow rounded-lg p-6 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 overflow-hidden">
                    <img src="images/donasi/1.png" alt="Insentif 1" class="w-full h-full">
                </div>
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-5xl font-bold text-[#433592]">Rp100.000</p>
                <p class="text-xl text-[#433592] mt-2 font-semibold">Nama tercantum di list leaderboard</p>
            </div>
            <div class="bg-[#FFF0E1] shadow rounded-lg p-6 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 overflow-hidden">
                    <img src="images/donasi/2.png" alt="Insentif 2" class="w-full h-full">
                </div>
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-5xl font-bold text-[#433592]">Rp50.000</p>
                <p class="text-xl text-[#433592] mt-2 font-semibold">Pesan tercantum di running text website</p>
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-6 bg-[#433592] text-white px-6 py-2 rounded-xl hover:bg-[#3a2d7a] transition-colors">Donasi</button>
    </div>
</section>

<!-- Donatur Teratas -->
<section class="py-16 bg-[#FFF0E1]">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Donatur Teratas</h2>
        
        <!-- Top 3 Donors - Rearranged: 2nd, 1st, 3rd -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- 2nd Place (Left) -->
            <div class="relative flex flex-col items-center bg-[#f3f3fd] p-6 rounded-lg shadow-lg">
                <div class="absolute -top-4 bg-gray-400 w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-lg border-2 border-white shadow-md">2</div>
                <div class="w-16 h-16 rounded-full overflow-hidden mt-6 mb-4">
                    <img src="images/donasi/pp.png" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <p class="font-bold text-[#433592] text-lg">Rafiif Nur Tahta Bagaskara</p>
                    <p class="text-gray-700 text-xl font-semibold">Rp4.000.000</p>
                </div>
            </div>
            
            <!-- 1st Place (Center) -->
            <div class="relative flex flex-col items-center bg-[#f3f3fd] p-6 rounded-lg shadow-lg">
                <div class="absolute -top-4 bg-yellow-400 w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-lg border-2 border-white shadow-md">1</div>
                <div class="w-10 h-10 mb-0">
                     <img src="images/donasi/mahkota.png" alt="Insentif 2" class="w-full h-full object-cover">
                </div>
                <div class="w-16 h-16 rounded-full overflow-hidden mb-4">
                    <img src="images/donasi/pp.png" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <p class="font-bold text-[#433592] text-lg">Rafiif Nur Tahta Bagaskara</p>
                    <p class="text-gray-700 text-xl font-semibold">Rp4.000.000</p>
                </div>
            </div>
            
            <!-- 3rd Place (Right) -->
            <div class="relative flex flex-col items-center bg-[#f3f3fd] p-6 rounded-lg shadow-lg">
                <div class="absolute -top-4 bg-orange-400 w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-lg border-2 border-white shadow-md">3</div>
                <div class="w-16 h-16 rounded-full overflow-hidden mt-6 mb-4">
                    <img src="images/donasi/pp.png" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="text-center">
                    <p class="font-bold text-[#433592] text-lg">Rafiif Nur Tahta Bagaskara</p>
                    <p class="text-gray-700 text-xl font-semibold">Rp4.000.000</p>
                </div>
            </div>
        </div>

        <!-- Ranks 4-8 (First Row) -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6 max-w-5xl mx-auto">
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">4</div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="images/donasi/pp.png" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp3.000.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">5</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp2.500.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">6</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp2.000.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">7</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp1.500.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">8</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp1.200.000</p>
                </div>
            </div>
        </div>

        <!-- Ranks 9-13 (Second Row) -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-5xl mx-auto">
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">9</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp1.000.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">10</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp800.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">11</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp600.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">12</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp400.000</p>
                </div>
            </div>
            <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                <div class="text-[#433592] font-bold text-lg">13</div>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-500 text-xs">PP</span>
                </div>
                <div class="text-left text-sm">
                    <p class="font-semibold text-[#433592] leading-tight">Rafiif Nur</p>
                    <p class="text-gray-700 leading-tight">Rp200.000</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-6">Apa Kata Mereka</h2>
        <p class="text-sm text-gray-500 mb-8">(Diperbarui setiap 3 bulan)</p>
        <div class="swiper-container-testimoni">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Nyanyian ini bukan sekedar nada, aku ingin kau mendengarnya, dengan hatimu bukan telinga."</p>
                        <p class="font-semibold mt-auto">Muhammad Arga Aryantara</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Layanan yang sangat membantu mahasiswa. Prosesnya mudah dan terpercaya!"</p>
                        <p class="font-semibold mt-auto">Sarah Wijaya</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Toko Pinjam benar-benar solusi untuk kebutuhan mahasiswa. Terima kasih!"</p>
                        <p class="font-semibold mt-auto">Budi Santoso</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Pelayanan yang ramah dan sistem yang transparan. Sangat direkomendasikan!"</p>
                        <p class="font-semibold mt-auto">Rina Kusuma</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Toko Pinjam memberikan solusi finansial yang tepat untuk mahasiswa seperti saya."</p>
                        <p class="font-semibold mt-auto">Ahmad Fauzi</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card">
                        <p class="italic mb-4">"Proses yang cepat dan tidak ribet. Sangat membantu dalam situasi mendesak."</p>
                        <p class="font-semibold mt-auto">Lisa Permata</p>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="window.open('https://sociobuzz.com/tokopinjam', '_blank')" class="mt-8 bg-[#433592] text-white px-6 py-2 rounded-xl hover:bg-[#3a2d7a] transition-colors">Donasi</button>
    </div>
</section>

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
        new Swiper('.chapter-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.chapter-slider .swiper-button-next',
                prevEl: '.chapter-slider .swiper-button-prev',
            },
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 1,
                }
            }
        });

        // Swiper untuk Testimoni - Auto slide to right with proper looping and equal box sizes
        new Swiper('.swiper-container-testimoni', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
                reverseDirection: false, // Slide to the right
            },
            loop: true,
            loopedSlides: 6, // Total number of slides for proper looping
            centeredSlides: true,
            speed: 800,
            direction: 'horizontal',
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 3,
                    centeredSlides: false,
                }
            }
        });
    });
</script>

</body>
<livewire:components.footer />
</div>