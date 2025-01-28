<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.17/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased bg-black text-white">
        <div class="min-h-screen flex flex-col justify-center items-center">
            @if (Route::has('login'))
                <nav class="absolute top-4 right-4 space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-200 hover:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-200 hover:text-white">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-200 hover:text-white">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif

            <!-- Page Content -->
            <main class="w-full max-w-md">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
