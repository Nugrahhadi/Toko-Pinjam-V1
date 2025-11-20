<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-extrabold text-center text-gray-800 mb-8" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
            As Mentioned in
        </h2>

        <div class="swiper-container media-partner-slider">
            <div class="swiper-wrapper">
                {{-- Loop seluruh partner media --}}
                @foreach ($partners as $partner)
                    <div class="swiper-slide flex justify-center items-center p-2">
                        <a href="{{ $partner->url ?? '#' }}" target="_blank" rel="noopener noreferrer" 
                           class="group block w-full max-w-xs text-center hover:opacity-75 transition duration-300">
                            
                            {{-- Ubah w-28 h-28 menjadi w-36 h-36 (Lebih besar) --}}
                            <div class="w-36 h-36 mx-auto mb-3 rounded-full bg-gray-100 flex items-center justify-center shadow-inner group-hover:shadow-md transition">
                                <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="Logo {{ $partner->name }}" class="max-w-[80%] max-h-[80%] object-contain" />
                            </div>
                            
                            {{-- Ubah text-sm menjadi text-base --}}
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
/* Kustomisasi W-36 (9rem) untuk Swiper agar tidak bentrok dengan ukuran standar Tailwind */
.media-partner-slider .swiper-slide .w-36 {
    width: 9rem; /* 144px */
    height: 9rem; /* 144px */
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.media-partner-slider', {
            // Tampilkan 4 logo di layar besar, 2 di layar kecil
            slidesPerView: 2,
            spaceBetween: 20,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40,
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