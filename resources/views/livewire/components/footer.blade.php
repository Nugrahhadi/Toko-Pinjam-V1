<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8">
            <!-- Logo and description -->
            <div class="md:col-span-1">
                <a href="/" class="flex items-center hover:opacity-80 transition-opacity">
                    <img src="{{ asset('images/logo-toko-pinjam.png') }}" 
                         alt="Toko Pinjam" 
                         class="h-16.5 w-auto max-w-[160px] object-contain">
                </a>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Rent useful household items from your local high street. Learn DIY & repair skills to complete projects yourself.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-semibold mb-4">The Things</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-white">Browse All Items</a></li>
                    <li><a href="#" class="hover:text-white">Categories</a></li>
                    <li><a href="#" class="hover:text-white">Featured Items</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Locations</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-white">Find Near You</a></li>
                    <li><a href="#" class="hover:text-white">Jakarta</a></li>
                    <li><a href="#" class="hover:text-white">Purwokerto</a></li>
                    <li><a href="#" class="hover:text-white">Bandung</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Support</h4>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li><a href="#" class="hover:text-white">Help Center</a></li>
                    <li><a href="#" class="hover:text-white">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm">
                © {{ date('Y') }} Toko Pinjam. All rights reserved.
            </p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Facebook</span>
                    📘
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Instagram</span>
                    📷
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <span class="sr-only">Twitter</span>
                    🐦
                </a>
            </div>
        </div>
    </div>
</footer>
