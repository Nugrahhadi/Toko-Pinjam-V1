<div>
    @section('title', __('messages.financial.title'))
    
    <!-- Navbar -->
    <livewire:components.navbar />
    
    <!-- Financial Report Header -->
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Left content -->
                <div class="flex-1">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-[#433592] mb-6" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                        {!! __('messages.financial.title_html') !!}
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
                 {{ __('messages.financial.subtitle') }}
            </p>
        </div>
    </section>

    <!-- Rekapitulasi donasi section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-8 text-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ __('messages.financial.for_what') }}
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
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.operational') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->operational, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.buy_goods') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->buy_goods, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.event') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->event, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-600 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.promotion') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->promotion, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-[#9333EA] rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.maintenance') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->maintenance, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-gray-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.others') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->others, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <hr class="my-4 border-gray-300">
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-xl font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.total') }}</span>
                        </div>
                        <span class="text-xl font-bold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->total, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Financial Reports Table -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#433592] mb-8 text-center" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                {{ __('messages.financial.documents') }}
            </h2>
            
            @php
                $years = [2025, 2026, 2027, 2028];
                $quarters = [
                    'I' => __('I (Jan-Mar)'),
                    'II' => __('II (Apr-Jun)'),
                    'III' => __('III (Jul-Sept)'),
                    'IV' => __('IV (Okt-Des)')
                ];
            @endphp

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border-t-2 border-[#433592]">
                    <thead class="border-t-2 border-[#433592]">
                        <tr class="border-b-2 border-[#433592]">
                            <th class="px-6 py-4 text-left text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.quarter') }}</th>
                            @foreach ($years as $year)
                                <th class="px-6 py-4 text-center text-lg font-semibold text-[#433592]" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quarters as $qKey => $qLabel)
                            <tr class="border-b-2 border-[#c4bbf4] last:border-[#433592]">
                                <td class="px-6 py-4 text-[#413291] font-medium" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ $qLabel }}</td>
                                @foreach ($years as $year)
                                    @php
                                        $report = $reports->first(fn($r) => $r->year == $year && $r->quarter == $qKey);
                                    @endphp
                                    <td class="px-6 py-4 text-center">
                                        @if ($report && $report->pdf_path)
                                            <a href="{{ asset('storage/' . $report->pdf_path) }}" target="_blank" class="inline-flex items-center text-[#433592] hover:underline font-semibold gap-1 text-sm sm:text-base" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                                <svg class="w-5 h-5 text-[#433592]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                {{ __('messages.financial.download') }}
                                            </a>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Need Help Section -->
    <livewire:components.butuh-bantuan />

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
                        data: [
                            {{ $allocation->operational }},
                            {{ $allocation->buy_goods }},
                            {{ $allocation->event }},
                            {{ $allocation->promotion }},
                            {{ $allocation->maintenance }},
                            {{ $allocation->others }}
                        ],
                        backgroundColor: [
                            '#F97316', // Oren-500
                            '#EF4444', // Red-500  
                            '#3B82F6', // Biru-500
                            '#16A34A', // Hijau-600
                            '#9333EA', // Maintenance
                            '#6B7280'  // Others (gray)
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
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    return `${label}: Rp ${value.toLocaleString('id-ID')} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
