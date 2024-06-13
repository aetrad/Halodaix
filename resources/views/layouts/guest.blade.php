<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Orbitron:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-haloGray">
        <div class="container mx-auto flex flex-col space-y-10">
            <nav class="flex justify-between items-center py-2">
                <div>
                    <a href="/" class="group font-bold text-3xl flex items-center space-x-4 hover:text-haloGreen transition">
                        <x-application-logo class="w-10 h-10 fill-current text-gray-500 group-hover:text-haloGreen transition" />
                        <span class="text-haloYellow">Halodaix</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4 justify-end">
                    <a class="font-bold text-haloYellow hover:text-haloGreen transition" href="/">Spartans</a>
                    <a class="font-bold text-haloYellow hover:text-haloGreen transition" href="{{ route('about.index') }}">À propos</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-bold text-haloYellow hover:text-haloGreen transition">Admin Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="font-bold text-haloYellow hover:text-haloGreen transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-haloYellow hover:text-haloGreen transition">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 font-bold text-haloYellow hover:text-haloGreen transition">Register</a>
                    @endauth
                </div>
            </nav>

            <main>
                {{ $slot }}
            </main>

            <footer class="bg-haloGray shadow mt-8">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-haloLightGray">
                    <div class="flex justify-center space-x-4">
                        <a href="https://github.com/your-profile" target="_blank" class="hover:text-haloGreen transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12c0 4.42 2.87 8.17 6.84 9.49.5.09.68-.22.68-.48v-1.7c-2.78.6-3.37-1.34-3.37-1.34-.45-1.15-1.11-1.46-1.11-1.46-.91-.62.07-.61.07-.61 1.01.07 1.54 1.04 1.54 1.04.9 1.54 2.35 1.1 2.92.84.09-.65.35-1.1.64-1.35-2.22-.25-4.56-1.11-4.56-4.94 0-1.09.39-1.99 1.03-2.69-.1-.26-.45-1.3.1-2.71 0 0 .84-.27 2.75 1.02a9.56 9.56 0 012.5-.34c.85 0 1.71.11 2.5.34 1.91-1.29 2.75-1.02 2.75-1.02.55 1.41.2 2.45.1 2.71.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.69-4.57 4.94.36.31.68.91.68 1.84v2.73c0 .26.18.58.69.48A9.996 9.996 0 0022 12c0-5.52-4.48-10-10-10z"/>
                            </svg>
                        </a>
                        <a href="https://linkedin.com/in/your-profile" target="_blank" class="hover:text-haloGreen transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.98 3.5C4.98 2.12 6.1 1 7.48 1c1.38 0 2.5 1.12 2.5 2.5S8.86 6 7.48 6C6.1 6 4.98 4.88 4.98 3.5zM4 8h6v14H4zM16.5 8h-2.5c-2.24 0-3.5 1.46-3.5 4.3V22h-6V8h6v2.57h.07C11.27 9.5 12.91 8 15.5 8c3.5 0 5 2.29 5 5.5V22h-6v-8.7c0-2.04-.52-3.3-2.04-3.3-2.04 0-2.96 1.61-2.96 3.29V22H4v-8.7c0-2.04-.52-3.3-2.04-3.3C-.04 9.61-.96 11.22-.96 12.9V22h-6V8h6v2.57h.07C2.27 9.5 3.91 8 6.5 8c3.5 0 5 2.29 5 5.5V22z"/>
                            </svg>
                        </a>
                        <a href="https://tiktok.com/@your-profile" target="_blank" class="hover:text-haloGreen transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.04C6.48 2.04 2 6.52 2 12.04s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm-.1 17.94c-3.52 0-6.38-2.86-6.38-6.38S8.38 7.22 11.9 7.22v4.83l4.38-1.8v4.83l-2.91 1.2c-1.37.57-2.8.87-4.38.87-.07 0-.13-.01-.2-.01z"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        &copy; {{ date('Y') }} Halodaix. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
