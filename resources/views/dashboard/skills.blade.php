<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            My Skills ⚡
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
                @foreach ($skills as $skill)
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="font-medium text-gray-800">{{ $skill['name'] }}</span>
                            <span class="text-sm text-indigo-600 font-semibold">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2.5 rounded-full transition-all"
                                 style="width: {{ $skill['level'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>