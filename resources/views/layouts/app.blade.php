<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-gray-800 text-white py-6 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Left Side: Company Info -->
                    <div class="text-center md:text-left mb-4 md:mb-0">
                        <h2 class="text-lg font-semibold">PNE United</h2>
                        <p class="text-sm text-gray-400"><strong>Made with ❤️ By R&D</strong></p>
                    </div>
        
                    <!-- Center: Quick Links -->
                    <div class="flex space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white text-sm">Dashboard</a>
                        <a href="{{ route('urls.index') }}" class="text-gray-400 hover:text-white text-sm">URL</a>

                    </div>
        
                    <!-- Right Side: Social Media -->
                    {{-- <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12.07c0-5.48-4.44-9.93-9.93-9.93S2.13 6.59 2.13 12.07c0 4.82 3.42 8.83 7.91 9.79v-6.93H7.66v-2.86h2.38V9.78c0-2.36 1.41-3.66 3.56-3.66 1.03 0 2.1.19 2.1.19v2.3h-1.18c-1.16 0-1.52.72-1.52 1.47v1.78h2.61l-.42 2.86h-2.19v6.93c4.48-.96 7.91-4.97 7.91-9.79z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.99 4.53a10 10 0 01-2.83.78 4.92 4.92 0 002.15-2.72 9.86 9.86 0 01-3.13 1.19A4.92 4.92 0 0016.69 3c-2.72 0-4.92 2.2-4.92 4.91 0 .39.04.77.13 1.14A13.95 13.95 0 012.24 3.61a4.9 4.9 0 001.52 6.55 4.94 4.94 0 01-2.23-.61v.06c0 2.42 1.72 4.43 4 4.89a5.1 5.1 0 01-1.29.17c-.32 0-.63-.03-.93-.09.64 1.98 2.48 3.42 4.67 3.46A9.86 9.86 0 010 19.54a13.96 13.96 0 007.57 2.22c9.09 0 14.07-7.53 14.07-14.07 0-.21 0-.42-.02-.63a10 10 0 002.46-2.53z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.04c-5.52 0-10 4.48-10 10 0 4.42 2.87 8.16 6.84 9.49.5.09.69-.22.69-.49v-1.68c-2.79.61-3.38-1.35-3.38-1.35-.45-1.14-1.11-1.45-1.11-1.45-.91-.63.07-.62.07-.62 1 .07 1.52 1.04 1.52 1.04.9 1.54 2.35 1.1 2.93.84.09-.66.35-1.1.64-1.36-2.23-.25-4.57-1.11-4.57-4.95 0-1.1.39-2 .99-2.71-.1-.25-.43-1.27.09-2.64 0 0 .84-.27 2.75 1.03a9.63 9.63 0 012.5-.34c.85.004 1.71.11 2.5.34 1.91-1.3 2.75-1.03 2.75-1.03.52 1.37.19 2.39.1 2.64.61.71 1 1.61 1 2.71 0 3.86-2.35 4.7-4.59 4.94.36.3.68.88.68 1.77v2.62c0 .27.19.58.69.49A10.02 10.02 0 0022 12.04c0-5.52-4.48-10-10-10z"/>
                            </svg>
                        </a>
                    </div> --}}
                </div>
        
                <!-- Divider -->
                <div class="border-t border-gray-700 mt-4 pt-4 text-center text-sm text-gray-400">
                    © {{ date('Y') }} PNE. All rights reserved.
                </div>
            </div>
        </footer>
        
    </body>
</html>
