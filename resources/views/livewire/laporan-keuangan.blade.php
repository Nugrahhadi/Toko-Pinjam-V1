<div>
    @section('title', 'Laporan Keuangan')
    
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Financial Report Header -->
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Left content -->
                <div class="flex-1">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        Laporan<br>Keuangan
                    </h1>
                </div>
                
                <!-- Right content -->
                <div class="flex-shrink-0 ml-8">
                    <img src="{{ asset('images/keu.png') }}" 
                         alt="Join Super Team" 
                         class="h-auto object-contain" 
                         style="width: 170px;">
                </div>
            </div>
            <p class="text-xl text-[#433592] leading-relaxed" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                 Sebagai <em>nonprofit organization</em> yang berkembang dan hidup melalui donasi, kami bertanggung jawab atas transparansi setiap rupiah yang masuk dan keluar. Laporan keuangan kami disusun dan dipublikasikan setiap kuartal dalam satu tahun.
            </p>
        </div>
    </section>

    <!-- Rekapitulasi donasi section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-8 text-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Untuk Apa Donasimu?
            </h2>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Pie Chart -->
                <div class="flex justify-center">
                    <div class="relative w-80 h-80">
                        <canvas id="donationChart" width="320" height="320"></canvas>
                    </div>
                </div>
                
                <!-- Legend -->
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-orange-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Operasional</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Beli Barang</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Event</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-600 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Promosi</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-gray-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Maintenance</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-purple-600 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Lainnya</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                    
                    <hr class="my-4 border-gray-300">
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-xl font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Total</span>
                        </div>
                        <span class="text-xl font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Rp 0</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Reports Table -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-8 text-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                Dokumen Laporan
            </h2>
            
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border-t-2 border-[#433592]">
                    <thead class="border-t-2 border-[#433592]">
                        <tr class="border-b-2 border-[#433592]">
                            <th class="px-6 py-4 text-left text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">Kuartal</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">2025</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">2026</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">2027</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">2028</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b-2 border-[#c4bbf4]">
                            <td class="px-6 py-4 text-[#413291] font-medium" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">I (Jan-Mar)</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                        </tr>
                        <tr class="border-b-2 border-[#c4bbf4]">
                            <td class="px-6 py-4 text-[#413291] font-medium" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">II (Apr-Jun)</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                        </tr>
                        <tr class="border-b-2 border-[#c4bbf4]">
                            <td class="px-6 py-4 text-[#413291] font-medium" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">III (Jul-Sept)</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                        </tr>
                        <tr class="border-b-2 border-[#433592]">
                            <td class="px-6 py-4 text-[#413291] font-medium" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">IV (Okt-Des)</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                            <td class="px-6 py-4 text-center text-gray-400">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Need Help Section -->
    <section class="bg-white py-12 w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#FDF5F2] rounded-lg shadow-md p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    
                    <!-- Left Content -->
                    <div>
                        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-4" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Kami Butuh Uluran Tanganmu
                        </h2>
                        <p class="text-gray-700 mb-4 text-base md:text-lg leading-relaxed">
                            Seluruh layanan kami dikerjakan secara sukarela tanpa ada perhitungan bisnis sama sekali.
                        </p>
                        <p class="text-gray-700 mb-6 text-base md:text-lg leading-relaxed">
                            Kami mengajak kamu untuk ikut bergerak bersama dalam gerakan ini dengan memberikan donasi dalam jumlah berapapun dan bentuk apapun!
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="https://www.tokopinjam.com/donasi" target="_blank"
                               class="inline-block bg-[#413291] text-white font-semibold px-5 py-2 rounded hover:bg-[#2e2367] transition">
                                Donasi Sekarang
                            </a>
                            <a href="https://www.tokopinjam.com/daftar-donatur" target="_blank"
                               class="inline-block bg-[#413291] text-white font-semibold px-5 py-2 rounded hover:bg-[#2e2367] transition">
                                Daftar Donatur Kami
                            </a>
                        </div>
                    </div>

                    <!-- Right Content Grid -->
                    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-2">
                        <!-- Overlay teks -->
                        <div class="absolute inset-0 flex justify-center items-center z-10">
                            <span class="text-[#413291] text-xl md:text-xl font-bold px-4 py-2 bg-yellow-400 transform" style="rotate: 5deg;">
                                Our Founders
                            </span>
                        </div>
                        <!-- Gambar 1 -->
                        <img src="{{ asset('images/butuhbantuan/111.jpg') }}"
                             alt="Photo 1"
                             class="w-full h-40 object-cover rounded-lg col-span-1 md:col-span-2">
                        <!-- Gambar 2 -->
                        <img src="{{ asset('images/butuhbantuan/22.jpg') }}"
                             alt="Photo 2"
                             class="w-full h-32 object-cover rounded-lg">
                        <!-- Gambar 3 -->
                        <img src="{{ asset('images/butuhbantuan/33.jpg') }}"
                             alt="Photo 3"
                             class="w-full h-32 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <livewire:components.footer />

    <!-- Pie Chart Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('donationChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Operasional', 'Beli Barang', 'Event', 'Promosi', 'Maintenance', 'Lainnya'],
                    datasets: [{
                        data: [0, 0, 0, 0, 0, 0],
                        backgroundColor: [
                            '#F97316', // Oren-500
                            '#EF4444', // Red-500  
                            '#3B82F6', // Biru-500
                            '#16A34A', // Hijau-600
                            '#9333EA', // Ungu-600
                            '#6B7280'  // Abu-500
                        ],
                        borderWidth: 0,
                        cutout: '40%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${label}: $${value.toLocaleString()} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
