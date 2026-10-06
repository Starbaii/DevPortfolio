<x-public-layout title="About">
    <div class="max-w-4xl mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold text-gray-900 mb-6">About Me</h1>
        <p class="text-lg text-gray-600 mb-10">{{ $bio }}</p>

        <h2 class="text-2xl font-semibold text-gray-900 mb-6">My Skills</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($skills as $skill)
                <div class="bg-white border border-indigo-100 rounded-lg p-4 text-center shadow-sm hover:shadow-md transition">
                    <span class="text-indigo-700 font-medium">{{ $skill }}</span>
                </div>
            @endforeach
        </div>
    </div>
</x-public-layout>