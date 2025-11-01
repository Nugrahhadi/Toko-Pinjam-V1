<div x-data="{ showMap: false }">
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" x-show="showMap" x-transition style="display: none;">
        <div class="bg-white rounded-3xl shadow-2xl max-w-6xl w-full mx-4 max-h-[90vh] overflow-hidden" @click.away="showMap = false">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold">{{ $title }}</h3>
                        <p class="text-blue-100 mt-2">{{ $description }}</p>
                    </div>
                    <button @click="showMap = false" class="text-white hover:text-gray-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 120px);">
                <div class="w-full h-96 rounded-2xl overflow-hidden shadow-lg mb-6">
                    <iframe 
                        src="https://www.arcgis.com/apps/mapviewer/index.html?layers=d17ba8b2eb1345dbad3d3ab1b7edee3a" 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        style="border:0;" 
                        allowfullscreen="" 
                        aria-hidden="false" 
                        tabindex="0">
                    </iframe>
                </div>

                <div class="mt-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 text-center">
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Mari Bersama Mewujudkan Keadilan Lingkungan</h4>
                    <p class="text-gray-600 mb-6">Toko Pinjam hadir sebagai solusi untuk mengurangi konsumsi berlebihan dan dampak lingkungan</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('pinjam-sekarang') }}" 
                           class="inline-flex items-center px-6 py-3 bg-purple-600 text-white font-semibold rounded-full hover:bg-purple-700 transition-colors">
                            Mulai Pinjam Sekarang
                        </a>
                        <a href="{{ route('bergabung-super-team') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-colors">
                            Bergabung Komunitas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div @click="showMap = true" class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 cursor-pointer shadow-lg">
        <div class="flex items-center space-x-3">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
            <span>Lihat Peta Kasus Ketidakadilan Lingkungan</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
        </div>
    </div>
</div>
