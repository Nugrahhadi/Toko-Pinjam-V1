<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Registrasi - {{ config('app.name', 'Toko Pinjam') }}</title>

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
        
        <!-- Additional Styles for Register -->
        <style>
            /* Override Tailwind with higher specificity */
            body.register-page {
                margin: 0 !important;
                padding: 0 !important;
                background: #f8fafc !important;
            }
            
            .register-container {
                background: #f8fafc !important;
                min-height: 100vh !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 2rem !important;
            }
            
            .register-card {
                background: white !important;
                border-radius: 12px !important;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
                max-width: 650px !important;
                width: 100% !important;
                padding: 3rem !important;
                border: 1px solid #e5e7eb !important;
            }
            
            .form-input, .form-select {
                width: 100% !important;
                padding: 0.875rem 1rem !important;
                border: 2px solid #6366f1 !important;
                border-radius: 8px !important;
                font-size: 0.875rem !important;
                transition: all 0.2s !important;
                background: white !important;
                color: #374151 !important;
                min-height: 48px !important;
                box-sizing: border-box !important;
            }
        </style>
        
        @stack('styles')
    </head>
    <body class="font-sans text-gray-900 antialiased custom-register-page">
        <livewire:register-form />
        
        @livewireScripts
        @stack('scripts')
    </body>
</html>
