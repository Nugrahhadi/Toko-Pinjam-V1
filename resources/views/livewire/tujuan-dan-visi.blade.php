<div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50">
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-purple-600 via-blue-600 to-teal-600">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-2xl lg:text-6xl font-bold text-white mb-6 animate-fade-in">
                    {{ __('We are standing for') }}<br>
                    <span class="text-yellow-300">{{ __('Environmental Justice') }}</span>
                </h1>
                <p class="text-base lg:text-2xl text-white/90 max-w-4xl mx-auto leading-relaxed">
                    {{ __('Environmental justice atau keadilan lingkungan adalah sebuah konsep dan gerakan yang menuntut distribusi yang adil atas manfaat dan beban lingkungan serta proses pengambilan keputusan yang inklusif dan bermakna bagi semua kelompok, terutama yang terpinggirkan') }}
                </p>
            </div>
        </div>
        
        <!-- Floating particles animation -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white/30 rounded-full animate-bounce"></div>
            <div class="absolute top-3/4 right-1/4 w-3 h-3 bg-yellow-300/40 rounded-full animate-pulse"></div>
            <div class="absolute top-1/2 left-3/4 w-1 h-1 bg-white/50 rounded-full animate-ping"></div>
        </div>
    </div>

    <!-- Ketimpangan Section -->
    <div class="py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-2xl lg:text-5xl font-bold text-[#433592] mb-6">
                    {{ __('Ketimpangan, ketimpangan, ketimpangan') }}
                </h2>
                <p class="text-base lg:text-lg text-[#433592] max-w-4xl mx-auto">
                    {{ __('Tinggal di perkotaan? coba sesekali ke pedesaan. Tinggal di pedesaan? coba sesekali tinggal di perkotaan. Kamu bukan hanya akan melihat, tapi juga merasakan ketimpangan, gap, disparitas akan akses kepada fasilitas penunjang dan pendukung kreatifitas.') }}
                </p>
            </div>

            <!-- Benefit vs Burden -->
            <div class="relative max-w-4xl mx-auto mb-16">
                    <div class="relative overflow-hidden rounded-2xl">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/tujuanVisi/benefitBurden.png') }}" 
                                 alt="Benefit vs Burden Diagram" 
                                 class="rounded-2xl transition-all duration-700 hover:scale-105"
                                 style="width: 1000px; height: auto; max-width: 100%;">
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8 mt-8">
                        <div class="bg-green-50 rounded-2xl p-6 border-l-4 border-green-500 transform hover:scale-105 transition-transform duration-300">
                            <h4 class="text-lg font-bold text-green-800 mb-3">{{ __('Contoh Benefit:') }}</h4>
                            <ul class="space-y-2 text-green-700">
                                <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>{{ __('Akses ruang terbuka hijau') }}</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>{{ __('Fasilitas bersepeda') }}</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>{{ __('Pilihan transportasi umum') }}</li>
                            </ul>
                        </div>
                        
                        <div class="bg-red-50 rounded-2xl p-6 border-l-4 border-red-500 transform hover:scale-105 transition-transform duration-300">
                            <h4 class="text-lg font-bold text-red-800 mb-3">{{ __('Contoh Burden:') }}</h4>
                            <ul class="space-y-2 text-red-700">
                                <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>{{ __('Polusi tanah air maupun udara') }}</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>{{ __('Pabrik-pabrik') }}</li>
                                <li class="flex items-center"><span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>{{ __('Sampah') }}</li>
                            </ul>
                        </div>
                    </div>
                
                <!-- Quote section -->
                <div class="mt-12 text-center">
                    <div class="bg-[#433592] text-white rounded-3xl p-8 transform hover:scale-105 transition-all duration-300 shadow-2xl">
                        <h3 class="text-2xl font-bold mb-4">{{ __('Dalam bahasa bayi:') }}</h3>
                        <blockquote class="text-lg italic leading-relaxed">
                            {{ __('"Daerah perkotaan memiliki dan mendapat manfaat yang lebih banyak dan menanggung beban yang cenderung lebih kecil dibanding daerah pedesaan, begitu juga sebaliknya."') }}
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl lg:text-5xl font-bold mb-8 text-[#413291]">
                {{ __('Manusia serakah, bumi terpaksa merekah') }}
            </h2>
            <p class="text-base lg:text-xl text-[#413291] max-w-3xl mx-auto">
                {{ __('Jika kamu pikir keadilan hanya untuk manusia, maka kamu tidak adil.') }}<br>
                {{ __('Bumi dan lingkungannya juga butuh keadilan.') }}
            </p>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-xl lg:text-4xl font-bold text-[#433592] mb-4">{{ __('Sekarang') }}</h2>

                <!-- Statistic 1 -->
                <div class="text-center p-8 bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-8xl font-black text-red-600 mb-4 animate-pulse">60%</div>
                    <p class="text-red-600 text-xl leading-relaxed">
                        {{ __('emisi global dihasilkan oleh konsumsi produk dan jasa rumah tangga, salah satu penyebab utama anthropogenic climate change') }}
                    </p>
                </div>

                <h2 class="text-xl lg:text-4xl font-bold text-[#433592] mt-12">{{ __('Proyeksi') }}</h2>
            </div>
             

            <div class="grid md:grid-cols-3 gap-8 mt-[-10px]">
                <!-- Statistic 2 -->
                <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-8xl font-black text-purple-600 mb-4 animate-bounce">9.6</div>
                    <p class="text-purple-600 text-lg leading-relaxed">
                        {{ __('milyar orang akan hidup di bumi pada 2050, and 11 milyar di 2100. Hampir dipastikan besar emisi dari konsumsi manusia akan meningkat') }}
                    </p>
                </div>
                
                <!-- Statistic 3 -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-8xl font-black text-blue-600 mb-4">300%</div>
                    <p class="text-blue-600 text-lg leading-relaxed">
                        {{ __('kematian akibat polusi udara akibat partikel halus (PM) di 2050 dibandingkan tahun 2000') }}
                    </p>
                </div>

                <!-- Statistic 4 -->
                <div class="text-center p-8 bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-8xl font-black text-custom-orange mb-4">4X</div>
                    <p class="text-custom-orange text-lg leading-relaxed">
                        {{ __('sampah di lautan akan meningkat di 20250 dibandingkan tahun 2000.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- We are over-consuming Section -->
    <div class="py-20 bg-gradient-to-br from-slate-100 via-blue-50 to-purple-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-32 h-32 bg-purple-600 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-blue-600 rounded-full blur-3xl animate-bounce"></div>
            <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-teal-500 rounded-full blur-2xl animate-ping"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Title -->
            <div class="text-center mb-16">
                <div class="inline-block px-6 py-2 bg-red-100 text-red-800 rounded-full text-md font-semibold mb-6 animate-bounce">
                    {{ __('- We are over-consuming, and it is a disease -') }}
                </div>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{ __('Highlighted case:') }} <span class="font-bold text-purple-700">{{ __('Gunung sampah TPA Bantar Gebang, Bekasi, Jawa Barat') }}</span>
                </p>
            </div>

            <!-- Case Study Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-16 transform hover:scale-105 transition-all duration-300">
                <div class="md:flex">
                    <!-- Image Section -->
                    <div class="md:w-3/5 p-6">
                        <div class="bg-gradient-to-br from-cyan-100 to-blue-200 rounded-2xl p-4 relative overflow-hidden" style="aspect-ratio: 1350/1012;">
                            <!-- TPA Bantar Gebang Image -->
                            <img src="{{ asset('images/tujuanVisi/sampahBantar.png') }}" 
                                 alt="TPA Bantar Gebang - Gunung Sampah" 
                                 class="w-full h-full object-cover rounded-xl shadow-lg transition-all duration-500 hover:scale-110">
                            
                            <!-- Image overlay with title -->
                            <div class="absolute bottom-4 left-4 right-4 bg-black/50 backdrop-blur-sm rounded-lg p-2">
                                <p class="text-white font-semibold text-sm">{{ __('TPA Bantar Gebang') }}</p>
                                <p class="text-gray-200 text-xs">{{ __('Gunung Sampah, Bekasi') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="md:w-2/5 p-6 flex flex-col justify-center">
                        <div class="space-y-4 text-[#413291]">
                            <p class="leading-relaxed text-lg">
                                {{ __('TPA ini menjadi tempat pembuangan utama bagi sampah yang dihasilkan oleh Jakarta, sebuah megapolitan dengan populasi lebih dari 10 jiwa.') }}
                            </p>
                            
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-lg">{{ __('Setiap harinya, Jakarta menghasilkan lebih dari 7.100 ton sampah, dan sebagian besar dikirim ke Bantar Gebang.') }}</p>
                                </div>
                                
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-lg">{{ __('Krisis sampah yang semakin memburuk memicu ketegangan antara pemulung, kelompok masyarakat sipil, dan pemerintah.') }}</p>
                                </div>
                                
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 bg-teal-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-lg">{{ __('Dampak lingkungan antara lain: pencemaran udara, air permukaan, air tanah, polusi suara, penurunan kualitas lanskap, dan penumpukan limbah.') }}</p>
                                </div>
                                
                                <div class="flex items-start space-x-3">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-lg">{{ __('Berpotensi Irreversible atau tidak dapat kembali seperti semula dalam jangka waktu satu atau beberapa generasi.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Question Section -->
            <div class="text-center mb-2">
                <h3 class="text-2xl font-medium text-[#413291] mb-8">
                    <strong>{{ __('Tertarik lihat kasus-kasus ketidakadilan lingkungan lain? Cek di sini') }}</strong>
                </h3>
                <livewire:components.arcgis-map 
                    map-id="environmental-justice-indonesia" 
                    title="Peta Ketidakadilan Lingkungan Indonesia" 
                    description="Eksplorasi kasus-kasus ketidakadilan lingkungan di seluruh Indonesia" />
            </div>
        </div>
    </div>

    <!-- Konsumsi in this economy Section -->
    <div class="py-20 bg-gradient-to-r from-purple-600 via-blue-600 to-teal-600 text-white relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-yellow-300/10 rounded-full blur-2xl animate-bounce"></div>
            <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-pink-400/20 rounded-full blur-xl animate-ping"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-2xl lg:text-5xl font-bold mb-8 animate-fade-in">
                    {{ __('Konsumtif? in this economy??!!') }}
                </h2>
            </div>
            
            <!-- Interactive Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <!-- Card 1: Daya Beli -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-110 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">📉</span>
                    <p class="font-bold text-lg text-white">{{ __('Daya Beli') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Masyarakat Turun') }}</p>
                </div>

                <!-- Card 2: Inflasi -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-110 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">📈</span>
                    <p class="font-bold text-lg text-white">{{ __('Inflasi Terus') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Meningkat') }}</p>
                </div>

                <!-- Card 3: Rata-rata penghasilan -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-110 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">💰</span>
                    <p class="font-bold text-lg text-white">{{ __('Rata-rata') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Penghasilan Stagnan') }}</p>
                </div>

                <!-- Card 4: Geopolitik -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-110 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">⚔️</span>
                    <p class="font-bold text-lg text-white">{{ __('Geopolitik dan') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Perang Merajalela') }}</p>
                </div>
            </div>

            <!-- Bottom Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 5: Lapangan kerja -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-105 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">🇮🇩</span>
                    <p class="font-bold text-lg text-white">{{ __('Gonjang Ganjing') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Politik Nasional') }}</p>
                </div>

                <!-- Card 6: Perubahan Iklim -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-105 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">    
                    <span class="text-6xl">🌍</span>
                    <p class="font-bold text-lg text-white">{{ __('Kebijakan "Gila"') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Pemimpin Dunia') }}</p>
                </div>

                <!-- Card 7: Biaya Hidup -->
                <div class="group bg-white/15 backdrop-blur-sm rounded-3xl p-6 text-center transform hover:scale-105 hover:bg-white/25 transition-all duration-300 cursor-pointer border border-white/20 hover:border-white/40">
                    <span class="text-6xl">💼</span>
                    <p class="font-bold text-lg text-white">{{ __('Stagnasi Jumlah') }}</p>
                    <p class="font-bold text-lg text-white">{{ __('Lapangan Kerja') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Solution Section: Toko Pinjam -->
    <div class="py-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 opacity-50"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <div class="text-center mb-16">
                <h2 class="text-2xl lg:text-5xl font-bold text-gray-900 mb-8">
                    {{ __('Maka dari itu,') }}<br>
                    <span class="text-purple-600">{{ __('Toko Pinjam hadir!') }}</span>
                </h2>
            </div>

            <!-- Solutions Grid -->
            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8">
                <!-- Solution 1 -->
                <div class="group bg-gradient-to-br from-purple-600 via-purple-500 to-blue-600 rounded-3xl p-8 text-white transform hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-purple-500/25 border border-purple-400/30">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300 border border-white/30">
                           <span class="text-4xl">🧰</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-4 leading-tight">{{ __('Menyediakan akses fasilitas untuk kreativitas secara gratis dan sukarela di daerah') }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="group bg-gradient-to-br from-green-600 via-green-500 to-teal-600 rounded-3xl p-8 text-white transform hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-green-500/25 border border-green-400/30">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300 border border-white/30">
                            <span class="text-4xl">♻️</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-4 leading-tight">{{ __('Ramah lingkungan dengan mengurangi sampah dan emisi karbon') }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="group bg-gradient-to-br from-orange-600 via-orange-500 to-red-600 rounded-3xl p-8 text-white transform hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-orange-500/25 border border-orange-400/30 lg:col-span-2 xl:col-span-1">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center group-hover:rotate-12 transition-transform duration-300 border border-white/30">
                            <span class="text-4xl">🤑</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-4 leading-tight">{{ __('Perkecil pengeluaran, sisanya bisa ditabung atau diinvestasikan') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- References Section -->
    <div class="py-16 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-32 h-32 bg-blue-600 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-purple-600 rounded-full blur-3xl animate-bounce"></div>
        </div>
        
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">References</h2>
            </div>

            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12">
                <div class="space-y-6 text-gray-700">
                    <div class="flex items-start space-x-4 p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed">
                            <strong>Ścibich-Harna, P.</strong> (2024, March). How over-consumption affects climate change. <em>Electronic Platform for Adult Learning in Europe</em>. 
                            <a href="https://epale.ec.europa.eu/en/blog/how-over-consumption-affects-climate-change" class="text-blue-600 hover:underline" target="_blank">
                                https://epale.ec.europa.eu/en/blog/how-over-consumption-affects-climate-change
                            </a>
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed">
                            <strong>Amalia, A. D., Isnaeni, N., & Alhadath, A.</strong> (2020). Revisiting the Path towards Environmental Justice in Indonesia: Devils in the Details? 
                            <em>IR-UI Commentaries, 1(5)</em>.
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed">
                            <strong>Global Atlas of Environmental Justice</strong> - Indonesia Cases: 
                            <a href="https://ejatlas.org/country/indonesia" class="text-green-600 hover:underline" target="_blank">Country Overview</a> | 
                            <a href="https://ejatlas.org/conflict/bantar-gebang-jakarta-landfill-indonesia" class="text-green-600 hover:underline" target="_blank">Bantar Gebang Case Study</a>
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-teal-50 rounded-xl hover:bg-teal-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed break-words">
                            <strong>Cho, R.</strong> (2020, December 18). How buying stuff drives climate change. <em>State of the Planet</em>. 
                            <a href="https://news.climate.columbia.edu/2020/12/16/buying-stuff-drives-climate-change/" class="text-teal-600 hover:underline break-all" target="_blank">
                                https://news.climate.columbia.edu/2020/12/16/buying-stuff-drives-climate-change/
                            </a>
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-orange-50 rounded-xl hover:bg-orange-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed">
                            <strong>United Nations.</strong> (n.d.). Consumerism and Climate change: How the choices you make can help mitigate the effects of climate change. 
                            <a href="https://www.un.org/en/academic-impact/consumerism-and-climate-change-how-choices-you-make-can-help-mitigate-effects" class="text-orange-600 hover:underline" target="_blank">
                                United Nations Academic Impact
                            </a>
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-red-50 rounded-xl hover:bg-red-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed break-words">
                            <strong>Millstein, S.</strong> (2025, January 17). How overconsumption affects the environment and health, explained. <em>Sentient</em>. 
                            <a href="https://sentientmedia.org/overconsumption/" class="text-red-600 hover:underline break-all" target="_blank">
                                https://sentientmedia.org/overconsumption/
                            </a>
                        </p>
                    </div>

                    <div class="flex items-start space-x-4 p-4 bg-indigo-50 rounded-xl hover:bg-indigo-100 transition-colors duration-300">
                        <p class="text-sm leading-relaxed">
                            <strong>Khan Academy.</strong> Environmental justice | Social Inequality | MCAT | Khan Academy [Video]. <em>YouTube</em>. 
                            <a href="https://www.youtube.com/watch?v=0L2xCwD5RNI" class="text-indigo-600 hover:underline" target="_blank">
                                https://www.youtube.com/watch?v=0L2xCwD5RNI
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <livewire:components.footer />
</div>
