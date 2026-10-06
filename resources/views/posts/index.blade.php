<x-public-layout title="Blog">
    <div class="max-w-4xl mx-auto px-6 py-16">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Blog Posts 📝</h1>
                <p class="text-gray-500 mt-1">Thoughts, tutorials, and updates</p>
            </div>

            @auth
                @if (!Auth::user()->isAdmin())
                    <a href="{{ route('posts.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium text-sm transition shadow-sm">
                        + Submit Post
                    </a>
                @endif
            @endauth
        </div>

        {{-- Success notification --}}
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif

        {{-- Posts list --}}
        <div class="space-y-4">
            @forelse ($posts as $post)
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 text-sm mb-3">
                        By {{ $post->user->name }} • {{ $post->created_at->format('M d, Y') }}
                    </p>
                    <p class="text-gray-700">{{ Str::limit($post->body, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="text-indigo-600 hover:underline text-sm font-medium mt-3 inline-block">
                        Read more →
                    </a>
                </article>
            @empty
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center text-gray-500">
                    No posts published yet.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>
</x-public-layout>