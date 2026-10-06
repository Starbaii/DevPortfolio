<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800">Blog Posts 📝</h2>
                <p class="text-sm text-gray-500 mt-1">Thoughts, tutorials, and updates</p>
            </div>
            @if (!Auth::user()->isAdmin())
                <a href="{{ route('posts.create') }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-5 py-2.5 rounded-lg font-medium transition shadow-sm">
                    + Submit Post
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
                    <span>✅</span> {{ session('success') }}
                </div>
            @endif

            @forelse ($posts as $post)
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h3>
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

            {{-- Pagination --}}
            <div class="pt-4">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</x-app-layout>