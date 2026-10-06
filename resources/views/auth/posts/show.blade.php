<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800">Post Details 📄</h2>
            <a href="{{ route('posts.index') }}"
               class="text-sm text-gray-500 hover:text-indigo-600 transition">
                ← Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <article class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $post->title }}</h1>
                <p class="text-gray-500 text-sm mb-8">
                    By <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
                    • {{ $post->created_at->format('F d, Y') }}
                </p>

                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $post->body }}
                </div>

            </div>
        </article>
    </div>
</x-app-layout>