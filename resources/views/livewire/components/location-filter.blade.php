<div class="bg-gray-50 py-8">
    <!-- HERO SECTION -->
<!-- HERO SECTION -->
<!-- HERO SECTION -->
<div 
    class="relative bg-cover bg-center bg-no-repeat min-h-[500px] py-24"
    style="background-image: url('{{ asset('images/landmark.jpg') }}');">

    <!-- Overlay Ungu Semi Transparan -->
    <div class="absolute inset-0 bg-purple-900 opacity-50"></div>

    <!-- Konten Hero -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="w-full mt-10 md:w-2/3 md:ml-auto md:pl-20 text-center md:text-left">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Kini Telah Hadir di Purwokerto!
            </h1>
            <p class="text-white text-base md:text-lg mb-6 max-w-xl">
                📍 Jl. Raya Klapasawit No.18, Dusun 2, Kalimanah Kulon, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371
            </p>
            <a href="https://instagram.com/tokopinjampurwokerto" target="_blank"
               class="inline-flex items-center gap-2 bg-white text-purple-900 font-semibold px-4 py-2 rounded-full shadow hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.357 3.608 1.332.975.975 1.27 2.242 1.332 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.357 2.633-1.332 3.608-.975.975-2.242 1.27-3.608 1.332-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.357-3.608-1.332-.975-.975-1.27-2.242-1.332-3.608C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.849c.062-1.366.357-2.633 1.332-3.608C4.54 2.582 5.807 2.287 7.173 2.225 8.438 2.167 8.818 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.072 5.648.135 4.295.426 3.192 1.529 2.089 2.632 1.798 3.985 1.735 5.39.676 5.804.663 6.213.663 12c0 5.787.013 6.196.072 7.476.063 1.404.354 2.757 1.457 3.86 1.103 1.103 2.456 1.394 3.86 1.457 1.28.059 1.689.072 7.476.072s6.196-.013 7.476-.072c1.404-.063 2.757-.354 3.86-1.457 1.103-1.103 1.394-2.456 1.457-3.86.059-1.28.072-1.689.072-7.476s-.013-6.196-.072-7.476c-.063-1.404-.354-2.757-1.457-3.86-1.103-1.103-2.456-1.394-3.86-1.457C18.196.013 17.787 0 12 0z"/>
                    <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.881 0 1.44 1.44 0 012.881 0z"/>
                </svg>
                tokopinjam.purwokerto
            </a>
        </div>
    </div>
</div>




    <div class="max-w-7xl mt-10 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center">
                    <span class="text-gray-700 font-medium mr-4">Find your nearest location:</span>
                    <div class="relative">
                        <select wire:model.live="selectedLocation" 
                                class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Indonesia</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->city }}, {{ $location->province }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="text-gray-600 text-sm">
                    <span class="font-semibold">Rent 45+ useful items from 21 locations</span>
                </div>
            </div>
        </div>

        <!-- Kotak lokasi kita -->
        <div class="mt-6 bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-2">
                Lokasi Kami - Purwokerto
            </h3>
            <p class="text-gray-600 mb-4">
                Universitas Jenderal Soedirman (UNSOED), Purwokerto, Jawa Tengah
            </p>
            <div class="w-full h-[400px] rounded overflow-hidden">
                <iframe
                    width="100%"
                    height="100%"
                    frameborder="0"
                    style="border:0"
                    src="https://maps.google.com/maps?q=Universitas%20Jenderal%20Soedirman%20Purwokerto&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
