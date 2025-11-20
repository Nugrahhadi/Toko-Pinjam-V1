{{-- PERBAIKAN: Seluruh konten View harus dibungkus dalam SATU tag root. --}}
<div>
    @if ($partners->isNotEmpty())
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-extrabold text-center text-gray-800 mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Our Partners
            </h2>

            <div class="swiper-container our-partner-slider">
                <div class="swiper-wrapper">
                    {{-- Loop seluruh partner --}}
                    @foreach ($partners as $partner)
                        <div class="swiper-slide flex justify-center items-center p-2">
                            <a href="{{ $partner->url ?? '#' }}" target="_blank" rel="noopener noreferrer" 
                               class="group block w-full max-w-xs text-center hover:opacity-75 transition duration-300">
                                
                                {{-- Logo Container Diperbesar: w-36 h-36 --}}
                                <div class="w-36 h-36 mx-auto mb-3 rounded-full bg-gray-100 flex items-center justify-center shadow-inner group-hover:shadow-md transition">
                                    {{-- Mengakses logo dari storage/app/public --}}
                                    <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="Logo {{ $partner->name }}" class="max-w-[80%] max-h-[80%] object-contain" />
                                </div>
                                
                                {{-- Nama Partner Diperbesar: text-base --}}
                                <p class="text-base font-medium text-gray-600 mt-2">{{ $partner->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
    /* Penting: Overwrite class Tailwind agar Swiper bekerja dengan benar pada ukuran besar */
    .our-partner-slider .swiper-slide .w-36 {
        width: 9rem; /* 144px */
        height: 9rem; /* 144px */
    }
    </style>
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.our-partner-slider', {
                // Tampilkan 2 di ponsel
                slidesPerView: 2, 
                spaceBetween: 10, 

                breakpoints: {
                    // Tampilkan 3 di tablet
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20, 
                    },
                    // Tampilkan 4 di desktop (mempertahankan 4 item)
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30, // Jarak diatur agar muat 4 item yang lebih besar
                    }
                },

                // Looping dan geser otomatis
                loop: true,
                autoplay: {
                    delay: 3000, 
                    disableOnInteraction: false, 
                },
            });
        });
    </script>
    @endpush
    @endif
</div>