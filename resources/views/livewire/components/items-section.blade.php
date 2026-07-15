<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            @foreach($categories as $category)
                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-200 transition-colors">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
            @foreach($featuredItems as $item)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        @if($item->first_image)
                            <img src="{{ $item->first_image }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="text-gray-400 text-center">
                                <div class="text-2xl mb-2">📦</div>
                                <div class="text-xs">{{ $item->name }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $item->location->city }}</p>
                        <p class="text-sm font-medium text-purple-600">
                            Rp {{ number_format($item->donation_price, 0, ',', '.') }} {{ $item->price_unit }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mb-12">
            @if($searchTerm)
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    {{ __('Search Results for') }} "{{ $searchTerm }}"
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ __('Found') }} {{ $items->count() + $featuredItems->count() }} {{ __('items matching your search.') }}
                    @if($items->count() == 0 && $featuredItems->count() == 0)
                        <span class="block mt-2 text-purple-600 font-medium">{{ __('No items found. Try a different search term.') }}</span>
                    @endif
                </p>
            @else
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    {{ __('Affordable things. The planet-friendly way.') }}
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ __("We've partnered with SHSH, SHSH, charity Shishi. They bisa find one item. Our team of fix choose light-craft, tools that can be repaired, or renting we can keep things out of landfill for longer and stop new stuff being made.") }}
                </p>
            @endif
        </div>

        @if($searchTerm && ($items->count() > 0 || $featuredItems->count() > 0))
            <div class="mb-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-900">{{ __('Search Results') }}</h3>
                <button wire:click="clearSearch" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                    {{ __('Clear Search') }}
                </button>
            </div>
        @endif
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @if($searchTerm)
                @foreach($items as $item)
                    <div class="text-center">
                        <div class="bg-gray-100 rounded-lg p-4 mb-3 aspect-square flex items-center justify-center">
                            @if($item->first_image)
                                <img src="{{ $item->first_image }}" alt="{{ $item->name }}" class="w-full h-full object-cover rounded">
                            @else
                                <div class="text-gray-400">
                                    <div class="text-3xl mb-2">{{ $item->category->icon ?? '📦' }}</div>
                                </div>
                            @endif
                        </div>
                        <h3 class="font-medium text-gray-900">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-600 mb-1">{{ $item->location->city }}</p>
                        <p class="text-sm text-gray-600">Rp {{ number_format($item->donation_price, 0, ',', '.') }} {{ $item->price_unit }}</p>
                    </div>
                @endforeach
            @else

                @foreach($items->take(4) as $item)
                    <div class="text-center">
                        <div class="bg-gray-100 rounded-lg p-4 mb-3 aspect-square flex items-center justify-center">
                            @if($item->first_image)
                                <img src="{{ $item->first_image }}" alt="{{ $item->name }}" class="w-full h-full object-cover rounded">
                            @else
                                <div class="text-gray-400">
                                    <div class="text-3xl mb-2">{{ $item->category->icon ?? '📦' }}</div>
                                </div>
                            @endif
                        </div>
                        <h3 class="font-medium text-gray-900">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-600">Rp {{ number_format($item->donation_price, 0, ',', '.') }} {{ $item->price_unit }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
