<div>
    <livewire:components.navbar />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Toko Pinjam Indonesia</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper 9 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <style>
        /* Tombol navigasi slider Chapter */
        .swiper-button-next, .swiper-button-prev {
            color: #433592; background: #fff; width: 44px; height: 44px; border-radius: 9999px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 16px; font-weight: 700; }
        .swiper-button-next:hover, .swiper-button-prev:hover { background: #433592; color: #fff; }

        /* Testimoni: pastikan slide fleksibel namun tinggi kartu seragam */
        .testimonials-swiper .swiper-slide { display: flex; align-items: stretch; height: auto; }
        .testimonial-card {
            height: 240px;            /* tinggi seragam */
            display: flex;
            flex-direction: column;
            align-items: center;       /* horizontal center */
            justify-content: center;   /* vertical center */
            text-align: center;
        }
        /* Limit baris kutipan agar rapi (opsional) */
        .testimonial-text {
            display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;
        }
    </style>
</head>

<body>

<!-- Hero Donasi -->
<section class="py-16 bg-[#fef7f5]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <div class="flex items-center gap-6">
            <div class="w-28 h-28 rounded-full overflow-hidden">
                <img src="{{ asset('images/donasi/logo.png') }}" alt="Toko Pinjam Indonesia" class="w-full h-full object-cover">
            </div>
            <div>
                <h1 class="text-4xl font-bold text-[#433592] mb-2">Toko Pinjam Indonesia</h1>
                <p class="text-gray-600 max-w-xl">Kami menghadirkan layanan pinjam murah untuk mahasiswa yang memberikan kabar gembira pada lingkungan.</p>
            </div>
        </div>
        <a href="https://sociabuzz.com/tokopinjam/donate" target="_blank" rel="noopener"
           class="mt-12 bg-[#433592] text-white px-6 py-2 rounded-xl hover:bg-[#3a2d7a] transition-colors">Donasi</a>
    </div>
</section>

<!-- Donasi Progress -->
<section class="bg-white py-16">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-[#433592]">
            <span id="donasiTotal" data-total="{{ (float)($total_amount ?? 0) }}">Rp{{ number_format((float)($total_amount ?? 0)) }}</span> telah terkumpul
        </h2>
        <div class="relative mt-6 h-4 bg-gray-200 rounded-full overflow-hidden">
            <div id="donasiProgress"
                 class="h-4 bg-[#433592] w-0 transition-all duration-1000 ease-in-out"
                 data-goal="{{ (float)($goal_amount ?? 1000000) }}"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-500 mt-1">
            <span>Rp0</span>
            <span>Rp{{ number_format((float)($goal_amount ?? 1000000)) }}</span>
        </div>
    </div>
</section>

<!-- Banner Laporan Keuangan -->
<div class="bg-[#9be1eb]">
    <div class="pt-8 pb-8 text-center">
        <h3 class="whitespace-nowrap text-2xl font-extrabold text-[#413291] mb-8" style="font-family: 'Google Sans','Product Sans',sans-serif;">
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
        <div class="swiper chapter-slider relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center">
                    <h3 class="text-lg font-medium mb-4">Chapter I: Purwokerto</h3>
                    <div class="bg-gray-200 rounded-lg shadow-md h-[400px] overflow-hidden">
                        <img src="{{ asset('images/donasi/pwtt.jpg') }}" alt="Chapter I Purwokerto" class="w-full h-full object-cover">
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

<!-- Insentif Donasi -->
<section class="bg-white py-16">
    <div class="max-w-5xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Insentif Donasi</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-[#FFF0E1] shadow rounded-lg p-6 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 overflow-hidden">
                    <img src="{{ asset('images/donasi/1.png') }}" alt="Insentif 1" class="w-full h-full">
                </div>
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-5xl font-bold text-[#433592]">Rp100.000</p>
                <p class="text-xl text-[#433592] mt-2 font-semibold">Nama tercantum di list leaderboard</p>
            </div>
            <div class="bg-[#FFF0E1] shadow rounded-lg p-6 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 overflow-hidden">
                    <img src="{{ asset('images/donasi/2.png') }}" alt="Insentif 2" class="w-full h-full">
                </div>
                <p class="text-lg text-gray-600">Total Donasi Minimum</p>
                <p class="text-5xl font-bold text-[#433592]">Rp50.000</p>
                <p class="text-xl text-[#433592] mt-2 font-semibold">Pesan tercantum di running text website</p>
            </div>
        </div>
    </div>
</section>

<!-- Donatur Teratas (dinamis) -->
<section class="py-16 bg-[#FFF0E1]">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-10">Donatur Teratas</h2>

        @php
            $top = collect($leaders ?? []);
            $first3 = $top->take(3)->values();
            $rest   = $top->slice(3)->values();
            // Urutan tampilan: kiri(2), tengah(1), kanan(3)
            $arrangedTop3 = collect();
            if ($first3->count() === 1)      { $arrangedTop3 = collect([$first3[0]]); }
            elseif ($first3->count() === 2)  { $arrangedTop3 = collect([$first3[1], $first3[0]]); }
            elseif ($first3->count() >= 3)   { $arrangedTop3 = collect([$first3[1], $first3[0], $first3[2]]); }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach($arrangedTop3 as $i => $row)
                @php
                    $rankReal = $i === 0 ? 2 : ($i === 1 ? 1 : 3);
                    $name = $row->user->full_name ?? $row->user->name ?? 'Anonim';
                    $parts = preg_split('/\s+/', trim($name)); $initials = '';
                    foreach ($parts as $p) { if ($p !== '') { $initials .= mb_substr($p,0,1); if (mb_strlen($initials) >= 2) break; } }
                    $initials = mb_strtoupper($initials);
                    $amt  = 'Rp'.number_format((float)$row->amount);
                    $badgeColor = $rankReal===1 ? 'bg-yellow-400' : ($rankReal===2 ? 'bg-gray-400' : 'bg-orange-400');
                @endphp

                <div class="relative flex flex-col items-center bg-[#f3f3fd] p-6 rounded-lg shadow-lg">
                    <div class="absolute -top-4 {{ $badgeColor }} w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-lg border-2 border-white shadow-md">{{ $rankReal }}</div>

                    @if($rankReal===1)
                        <div class="w-10 h-10 mb-1">
                            <img src="{{ asset('images/donasi/mahkota.png') }}" alt="Mahkota" class="w-full h-full object-contain">
                        </div>
                    @else
                        <div class="h-10"></div>
                    @endif

                    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center mb-4">
                        <span class="text-gray-700 font-bold">{{ $initials ?: '—' }}</span>
                    </div>
                    <div class="text-center">
                        <p class="font-bold text-[#433592] text-lg">{{ $name }}</p>
                        <p class="text-gray-700 text-xl font-semibold">{{ $amt }}</p>
                    </div>
                </div>
            @endforeach

            @for($i=$arrangedTop3->count(); $i<3; $i++)
                @php
                    $rankReal = $i===0?2:($i===1?1:3);
                    $badgeColor = $rankReal===1 ? 'bg-yellow-400' : ($rankReal===2 ? 'bg-gray-400' : 'bg-orange-400');
                @endphp
                <div class="relative flex flex-col items-center bg-[#f3f3fd] p-6 rounded-lg shadow-lg opacity-60">
                    <div class="absolute -top-4 {{ $badgeColor }} w-8 h-8 flex items-center justify-center rounded-full text-white font-bold text-lg border-2 border-white shadow-md">{{ $rankReal }}</div>
                    <div class="h-10"></div>
                    <div class="w-16 h-16 rounded-full bg-gray-300 flex items-center justify-center mb-4">
                        <span class="text-gray-700 font-bold">—</span>
                    </div>
                    <div class="text-center">
                        <p class="font-bold text-[#433592] text-lg">—</p>
                        <p class="text-gray-700 text-xl font-semibold">Rp0</p>
                    </div>
                </div>
            @endfor
        </div>

        @php
            $chunk1 = $rest->slice(0, 5);
            $chunk2 = $rest->slice(5, 5);
        @endphp

        <!-- Peringkat 4-8 -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6 max-w-5xl mx-auto">
            @foreach($chunk1 as $idx => $row)
                @php
                    $rank = $idx + 4;
                    $name = $row->user->full_name ?? $row->user->name ?? 'Anonim';
                    $parts = preg_split('/\s+/', trim($name)); $initials = '';
                    foreach ($parts as $p) { if ($p !== '') { $initials .= mb_substr($p,0,1); if (mb_strlen($initials) >= 2) break; } }
                    $initials = mb_strtoupper($initials);
                    $amt  = 'Rp'.number_format((float)$row->amount);
                @endphp
                <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                    <div class="text-[#433592] font-bold text-lg w-6 text-left">{{ $rank }}</div>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-700 text-xs font-bold">{{ $initials ?: '—' }}</span>
                    </div>
                    <div class="text-left text-sm">
                        <p class="font-semibold text-[#433592] leading-tight">{{ $name }}</p>
                        <p class="text-gray-700 leading-tight">{{ $amt }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Peringkat 9-13 -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 max-w-5xl mx-auto">
            @foreach($chunk2 as $idx => $row)
                @php
                    $rank = $idx + 9;
                    $name = $row->user->full_name ?? $row->user->name ?? 'Anonim';
                    $parts = preg_split('/\s+/', trim($name)); $initials = '';
                    foreach ($parts as $p) { if ($p !== '') { $initials .= mb_substr($p,0,1); if (mb_strlen($initials) >= 2) break; } }
                    $initials = mb_strtoupper($initials);
                    $amt  = 'Rp'.number_format((float)$row->amount);
                @endphp
                <div class="flex items-center bg-[#f3f3fd] p-3 rounded-lg shadow-sm gap-3">
                    <div class="text-[#433592] font-bold text-lg w-6 text-left">{{ $rank }}</div>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-700 text-xs font-bold">{{ $initials ?: '—' }}</span>
                    </div>
                    <div class="text-left text-sm">
                        <p class="font-semibold text-[#433592] leading-tight">{{ $name }}</p>
                        <p class="text-gray-700 leading-tight">{{ $amt }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimoni (dinamis) -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-[#433592] mb-6">Apa Kata Mereka</h2>
        <p class="text-sm text-gray-500 mb-8">(Diperbarui berkala)</p>

        <!-- wire:ignore penting agar Swiper tidak terganggu re-render Livewire -->
        <div class="swiper testimonials-swiper" wire:ignore>
            <div class="swiper-wrapper">
                @forelse(($testimonials ?? []) as $t)
                    @php $tname = $t->user->full_name ?? $t->user->name ?? 'Anonim'; @endphp
                    <div class="swiper-slide">
                        <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card w-full">
                            <p class="testimonial-text italic mb-4">"{{ $t->message }}"</p>
                            <p class="font-semibold">{{ $tname }}</p>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="bg-[#433592] text-white p-6 max-w-md mx-auto rounded-xl shadow testimonial-card w-full">
                            <p class="testimonial-text italic mb-4">"Belum ada testimoni."</p>
                            <p class="font-semibold">—</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
/* Progress anim */
(function(){
    const totalEl = document.getElementById('donasiTotal');
    const progressEl = document.getElementById('donasiProgress');
    const total = parseFloat(totalEl?.dataset.total || '0');
    const goal  = parseFloat(progressEl?.dataset.goal || '1000000');
    let frame = 0, steps = 60; // ~1s
    const timer = setInterval(() => {
        frame++;
        const val = Math.round(total * (frame/steps));
        if (totalEl) totalEl.textContent = 'Rp' + (val).toLocaleString('id-ID');
        if (progressEl) progressEl.style.width = Math.min(100, (total/Math.max(goal,1))*100) + '%';
        if (frame >= steps) clearInterval(timer);
    }, 1000/60);
})();

/* Chapter Swiper */
window.addEventListener('load', () => {
    new Swiper('.chapter-slider', {
        slidesPerView: 1, spaceBetween: 20, loop: true,
        navigation: { nextEl: '.chapter-slider .swiper-button-next', prevEl: '.chapter-slider .swiper-button-prev' },
        autoplay: { delay: 5000, disableOnInteraction: false },
    });
});

/* Testimonial Swiper — auto swipe + loop stabil */
function initTestimonialSwiper() {
    const selector = '.testimonials-swiper';
    const el = document.querySelector(selector);
    if (!el) return;

    const wrapper = el.querySelector('.swiper-wrapper');
    if (!wrapper) return;

    // Jika slide kurang dari 6, gandakan agar loop Swiper stabil di semua breakpoint
    const minSlides = 6;
    const currentSlides = wrapper.children.length;
    if (currentSlides > 0 && currentSlides < minSlides) {
        const originals = Array.from(wrapper.children);
        for (let i = 0; i < (minSlides - currentSlides); i++) {
            wrapper.appendChild(originals[i % currentSlides].cloneNode(true));
        }
    }

    // Hancurkan instance sebelumnya (jika ada)
    if (window.testiSwiper && typeof window.testiSwiper.destroy === 'function') {
        window.testiSwiper.destroy(true, true);
        window.testiSwiper = null;
    }

    // Inisialisasi
    window.testiSwiper = new Swiper(selector, {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        loopAdditionalSlides: 10,
        speed: 700,
        allowTouchMove: true,
        autoplay: { delay: 1800, disableOnInteraction: false, pauseOnMouseEnter: false },
        observer: true,
        observeParents: true,
        observeSlideChildren: true,
        centeredSlides: false,
        breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
        on: {
            init(sw){ try { sw.autoplay.start(); } catch(e){} },
            touchEnd(sw){ try { sw.autoplay.start(); } catch(e){} },
            sliderMove(sw){ try { sw.autoplay.start(); } catch(e){} },
            reachEnd(sw){ try { sw.slideNext(); sw.autoplay.start(); } catch(e){} },
            loopFix(sw){ try { sw.autoplay.start(); } catch(e){} },
        }
    });

    // Jika tab kembali aktif, lanjutkan autoplay
    document.addEventListener('visibilitychange', () => {
        if (document.visibilityState === 'visible' && window.testiSwiper) {
            try { window.testiSwiper.autoplay.start(); } catch(e){}
        }
    });
}

// Init saat load & saat Livewire navigate
window.addEventListener('load', initTestimonialSwiper);
document.addEventListener('livewire:navigated', initTestimonialSwiper);

// Re-init setelah resize (debounced) untuk jaga-jaga
let tpResizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(tpResizeTimer);
    tpResizeTimer = setTimeout(initTestimonialSwiper, 250);
});
</script>

</body>

<livewire:components.footer />
</div>
