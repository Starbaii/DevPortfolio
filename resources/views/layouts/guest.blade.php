<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DevPortfolio') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        {{-- Background --}}
        <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-purple-50 px-4 py-8 relative overflow-hidden">

            {{-- Soft decorative blobs --}}
            <div class="absolute top-[-100px] left-[-100px] w-72 h-72 bg-indigo-200 rounded-full opacity-40 blur-3xl"></div>
            <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-purple-200 rounded-full opacity-40 blur-3xl"></div>

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="relative z-10 mb-8 flex items-center gap-2 text-2xl font-bold text-indigo-900">
                💻 DevPortfolio
            </a>

            {{-- Card --}}
            <div class="relative z-10 w-full sm:max-w-md bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl border border-white/60 px-8 py-10">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="relative z-10 text-xs text-gray-400 mt-8">
                &copy; {{ date('Y') }} DevPortfolio. Built with Laravel Breeze.
            </p>
        </div>
    </body>
</html>