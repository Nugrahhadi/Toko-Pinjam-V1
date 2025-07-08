<div class="bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
