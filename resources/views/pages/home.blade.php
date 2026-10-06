<x-public-layout title="Home">
    {{-- Hero --}}
    <section class="bg-gradient-to-br from-indigo-900 via-indigo-800 to-purple-900 text-white">
        <div class="max-w-6xl mx-auto px-6 py-28 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">{{ $name }}</h1>
            <p class="text-2xl text-indigo-200 mb-10">{{ $role }}</p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('projects.index') }}"
                   class="bg-white text-indigo-900 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-100 transition">
                    View My Projects
                </a>
                <a href="{{ route('contact') }}"
                   class="border-2 border-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-900 transition">
                    Contact Me
                </a>
            </div>
        </div>
    </section>

    {{-- Feature cards --}}
    <section class="max-w-6xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-lg font-bold text-indigo-900 mb-2">💼 Experience</h3>
                <p class="text-gray-600 text-sm">Building web apps with Laravel, PHP, and modern JS frameworks.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-lg font-bold text-indigo-900 mb-2">🚀 Projects</h3>
                <p class="text-gray-600 text-sm">A collection of practical, real-world applications I've shipped.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <h3 class="text-lg font-bold text-indigo-900 mb-2">📬 Let's Talk</h3>
                <p class="text-gray-600 text-sm">Open for freelance work, collaboration, or full-time roles.</p>
            </div>
        </div>
    </section>
</x-public-layout>