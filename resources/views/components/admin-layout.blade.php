@props(['title' => 'Admin'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }} — Admin · {{ config('app.name', 'DevPortfolio') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-slate-100">

        <div class="min-h-screen flex flex-col">

            {{-- Admin Top Bar --}}
            <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-40 border-b-4 border-red-600">
                <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🛡️</span>
                        <div>
                            <p class="font-bold text-lg leading-tight">Admin Panel</p>
                            <p class="text-xs text-slate-400">DevPortfolio Management</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}" class="text-sm text-slate-300 hover:text-white transition">
                            ← Back to Site
                        </a>

                        <div class="flex items-center gap-2 bg-slate-800 px-3 py-1.5 rounded-lg">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span class="text-sm">{{ Auth::user()->name }}</span>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-red-400 hover:text-red-300 font-medium transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="flex flex-1">

                {{-- Admin Sidebar --}}
                <aside class="hidden md:flex md:flex-col w-64 bg-slate-800 text-slate-100 p-6 gap-1">
                    <p class="text-xs uppercase tracking-wider text-slate-500 font-semibold mb-3">Manage</p>

                    <a href="{{ route('admin.posts.index') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition
                       {{ request()->routeIs('admin.posts.index') ? 'bg-red-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                        <span>📝</span> Posts
                    </a>

                    <a href="{{ route('admin.posts.create') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition
                       {{ request()->routeIs('admin.posts.create') ? 'bg-red-600 text-white font-semibold' : 'hover:bg-slate-700' }}">
                        <span>➕</span> Add Post
                    </a>

                    <p class="text-xs uppercase tracking-wider text-slate-500 font-semibold mt-6 mb-3">Navigation</p>

                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-700 transition">
                        <span>🏠</span> Dashboard
                    </a>

                    <a href="{{ route('posts.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-slate-700 transition">
                        <span>🌐</span> Public Blog
                    </a>

                    <div class="mt-auto pt-6 border-t border-slate-700">
                        <p class="text-xs text-slate-500">Signed in as</p>
                        <p class="text-sm font-medium">{{ Auth::user()->email }}</p>
                        <span class="inline-block mt-2 text-[10px] font-bold bg-red-600 text-white px-2 py-0.5 rounded">
                            ADMIN
                        </span>
                    </div>
                </aside>

                {{-- Main Content --}}
                <main class="flex-1 p-6 md:p-10">
                    {{ $slot }}
                </main>
            </div>

            <footer class="bg-slate-900 text-slate-400 text-center py-4 text-sm">
                &copy; {{ date('Y') }} DevPortfolio Admin Panel
            </footer>
        </div>

    </body>
</html>