<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - {{ config('app.name', 'Toko Pinjam') }}</title>

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
        
        <!-- Additional Styles for Login -->
        <style>
            /* Override Tailwind with higher specificity */
            body.login-page {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }
            
            .login-container {
                min-height: 100vh !important;
                display: grid !important;
                grid-template-columns: 1fr 1fr !important;
            }
            
            .login-left {
                background: white !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 3rem !important;
            }
            
            .login-right {
                background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%) !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 3rem !important;
                position: relative !important;
                overflow: hidden !important;
            }
            
            .form-input {
                width: 100% !important;
                padding: 0.875rem 1rem !important;
                border: 2px solid #e5e7eb !important;
                border-radius: 8px !important;
                font-size: 0.875rem !important;
                transition: all 0.2s !important;
                background: white !important;
                color: #374151 !important;
            }
        </style>
        
        @stack('styles')
    </head>
    <body class="font-sans text-gray-900 antialiased custom-login-page">
        <livewire:login-form />
        
        @livewireScripts
        @stack('scripts')
    </body>
</html>
