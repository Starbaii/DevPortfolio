@props(['title' => 'DevPortfolio'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} — {{ config('app.name', 'DevPortfolio') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">

        {{-- ============ NAVBAR ============ --}}
        <nav class="bg-indigo-900 text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold">💻 DevPortfolio</a>

                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="hover:text-indigo-300 text-sm">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-indigo-300 text-sm">About</a>
                    <a href="{{ route('projects.index') }}" class="hover:text-indigo-300 text-sm">Projects</a>
                    <a href="{{ route('posts.index') }}" class="hover:text-indigo-300 text-sm">Blog</a>
                    <a href="{{ route('contact') }}" class="hover:text-indigo-300 text-sm">Contact</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-indigo-300 text-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-indigo-300 text-sm">Login</a>
                        <a href="{{ route('register') }}"
                           class="bg-white text-indigo-900 px-4 py-1.5 rounded-lg text-sm font-medium hover:bg-indigo-100 transition">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- ============ PAGE CONTENT ============ --}}
        <main>
            {{ $slot }}
        </main>

        {{-- ============ FOOTER ============ --}}
        <footer class="bg-indigo-900 text-indigo-100 text-center py-6 mt-12">
            <p class="text-sm">
                &copy; {{ date('Y') }} <span class="font-semibold">DevPortfolio</span>. Built with Laravel Breeze.
            </p>
        </footer>

    </body>
</html>