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
                    <img src="{{ asset('images/keu.webp') }}" 
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
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.item_procurement') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->item_procurement, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.website_operations') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->website_operations, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.creative_work') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->creative_work, 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-600 rounded-full mr-3"></div>
                            <span class="text-lg font-medium text-gray-700" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">{{ __('messages.financial.digital_subscriptions') }}</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                            Rp {{ number_format($allocation->digital_subscriptions, 0, ',', '.') }}
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
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                @foreach ($years as $year)
                    @php
                        $report = $reports->first(fn($r) => $r->year == $year);
                    @endphp
                    <div class="bg-[#fcfbfe] rounded-2xl border-2 border-[#e6e2fa] p-6 flex flex-col justify-between hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 text-center">
                        <div>
                            <div class="flex flex-col items-center justify-center mb-6">
                                <span class="px-3 py-1 bg-[#ede9fe] text-[#5b3eb8] text-xs font-semibold rounded-full uppercase tracking-wider mb-2">
                                    {{ __('messages.financial.annual_report') }}
                                </span>
                                <span class="text-3xl font-black text-[#5b3eb8]">{{ $year }}</span>
                            </div>
                        </div>

                        <div>
                            @if ($report && $report->pdf_path)
                                <a href="{{ asset('storage/' . $report->pdf_path) }}" download target="_blank" class="w-full inline-flex items-center justify-center px-4 py-3 bg-[#433592] hover:bg-[#322575] text-white font-semibold rounded-xl gap-2 transition-all duration-200 text-sm shadow-md" style="font-family: 'Google Sans', 'Product Sans', sans-serif;">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    @if ($year == 2026)
                                        {{ __('2026: The start of Toko Pinjam') }}
                                    @else
                                        {{ __('messages.financial.download') }}
                                    @endif
                                </a>
                            @else
                                <div class="w-full inline-flex items-center justify-center px-4 py-3 bg-gray-100 text-gray-400 font-semibold rounded-xl gap-2 text-sm border-2 border-dashed border-gray-200">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    {{ __('Belum tersedia') }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
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
                    labels: [
                        '{{ __('messages.financial.item_procurement') }}',
                        '{{ __('messages.financial.website_operations') }}',
                        '{{ __('messages.financial.creative_work') }}',
                        '{{ __('messages.financial.digital_subscriptions') }}',
                        '{{ __('messages.financial.others') }}'
                    ],
                    datasets: [{
                        data: [
                            {{ $allocation->item_procurement }},
                            {{ $allocation->website_operations }},
                            {{ $allocation->creative_work }},
                            {{ $allocation->digital_subscriptions }},
                            {{ $allocation->others }}
                        ],
                        backgroundColor: [
                            '#F97316', // Oren-500
                            '#EF4444', // Red-500  
                            '#3B82F6', // Biru-500
                            '#16A34A', // Hijau-600
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
