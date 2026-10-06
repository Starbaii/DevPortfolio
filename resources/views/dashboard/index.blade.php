<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Dashboard 👋
                </h2>
                <p class="text-sm text-gray-500 mt-1">Welcome back, {{ $user->name }}</p>
            </div>
            <span class="hidden sm:inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg text-sm font-medium">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                Online
            </span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- ✅ SUCCESS NOTIFICATION --}}
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
                    <span>✅</span> {{ session('success') }}
                </div>
            @endif

            {{-- Stat Cards --}}
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Projects</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['projects'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center text-2xl">🚀</div>
                    </div>
                    <p class="text-xs text-green-600 mt-4 font-medium">↑ 12% from last month</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Messages</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['messages'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-2xl">📬</div>
                    </div>
                    <p class="text-xs text-green-600 mt-4 font-medium">↑ 5% from last month</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Visitors</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['visitors'] }}</p>
                        </div>
                        <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center text-2xl">👀</div>
                    </div>
                    <p class="text-xs text-green-600 mt-4 font-medium">↑ 24% from last month</p>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="grid sm:grid-cols-3 gap-4">
                    <a href="{{ route('skills.index') }}"
                       class="flex items-center gap-3 p-4 rounded-xl border border-gray-100 hover:border-indigo-300 hover:bg-indigo-50 transition">
                        <span class="text-2xl">⚡</span>
                        <div>
                            <p class="font-medium text-gray-800">Manage Skills</p>
                            <p class="text-xs text-gray-500">Update your skill set</p>
                        </div>
                    </a>
                    <a href="{{ route('messages.index') }}"
                       class="flex items-center gap-3 p-4 rounded-xl border border-gray-100 hover:border-indigo-300 hover:bg-indigo-50 transition">
                        <span class="text-2xl">📥</span>
                        <div>
                            <p class="font-medium text-gray-800">View Messages</p>
                            <p class="text-xs text-gray-500">Read new inquiries</p>
                        </div>
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="flex items-center gap-3 p-4 rounded-xl border border-gray-100 hover:border-indigo-300 hover:bg-indigo-50 transition">
                        <span class="text-2xl">🌐</span>
                        <div>
                            <p class="font-medium text-gray-800">Public Blog</p>
                            <p class="text-xs text-gray-500">See published posts</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>