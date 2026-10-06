<x-public-layout :title="$post->title">
    <article class="max-w-3xl mx-auto px-6 py-16">
        <a href="{{ route('posts.index') }}" class="text-indigo-600 hover:underline text-sm">← Back to Posts</a>
        <h1 class="text-4xl font-bold text-gray-900 mt-4 mb-3">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-8">By <span class="font-medium text-gray-700">{{ $post->user->name }}</span> • {{ $post->created_at->format('F d, Y') }}</p>
        <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">{{ $post->body }}</div>
    </article>
</x-public-layout>
