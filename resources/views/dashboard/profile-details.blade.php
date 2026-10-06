<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Profile Info 👤
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Header card --}}
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl shadow-md p-8 text-white">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-3xl font-bold border-2 border-white/40">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">{{ $details['full_name'] }}</h3>
                        <p class="text-indigo-200 text-sm">{{ $details['role'] }}</p>
                        <p class="text-indigo-200 text-xs mt-1">📍 {{ $details['location'] }}</p>
                    </div>
                </div>
            </div>

            {{-- Bio + contact --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">About</h4>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $details['bio'] }}</p>

                <h4 class="text-lg font-semibold text-gray-800 mb-3">Contact</h4>
                <div class="grid sm:grid-cols-2 gap-3">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span class="text-indigo-600">✉️</span> {{ $details['email'] }}
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span class="text-indigo-600">💼</span> {{ $details['role'] }}
                    </div>
                </div>
            </div>

            {{-- Social links --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Social Links</h4>
                <div class="space-y-3">
                    @foreach ($details['socials'] as $social)
                        <a href="{{ $social['url'] }}" target="_blank"
                           class="flex items-center justify-between p-3 rounded-lg border border-gray-100 hover:border-indigo-300 hover:bg-indigo-50 transition">
                            <div class="flex items-center gap-3">
                                <span class="font-medium text-gray-800">{{ $social['platform'] }}</span>
                                <span class="text-sm text-gray-500">{{ $social['handle'] }}</span>
                            </div>
                            <span class="text-indigo-600 text-sm">→</span>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Action --}}
            <div class="flex justify-end">
                <a href="{{ route('profile.edit') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg font-medium transition shadow-sm">
                    Edit Profile Settings
                </a>
            </div>

        </div>
    </div>
</x-app-layout>