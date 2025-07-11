<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Toko Pinjam') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_io/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/favicon-16x16.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon_io/site.webmanifest') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Product+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <!-- Fallback untuk Google Sans jika tersedia -->
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;600;700;800;900&display=swap');
        
        body {
            font-family: 'Google Sans', 'Product Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-50">
            @yield('content')
            {{ $slot ?? '' }}
        </div>

        @livewireScripts
        
        <!-- Scroll to How It Works Script -->
        <script>
            function scrollToHowItWorks() {
                const howItWorksSection = document.getElementById('how-it-works');
                if (howItWorksSection) {
                    howItWorksSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                } else {
                    // If not on the landing page, redirect to home and then scroll
                    window.location.href = '/#how-it-works';
                }
            }
            
            // Check if there's a hash in the URL when page loads
            document.addEventListener('DOMContentLoaded', function() {
                if (window.location.hash === '#how-it-works') {
                    setTimeout(() => {
                        scrollToHowItWorks();
                    }, 500); // Wait for page to load
                }
            });
        </script>
    </body>
</html>
