<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800">🛡️ Admin · Posts</h2>
                <p class="text-sm text-gray-500 mt-1">Manage all posts — published and pending</p>
            </div>
            <a href="{{ route('admin.posts.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white text-sm px-5 py-2.5 rounded-lg font-medium transition shadow-sm">
                + Add Post
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Success notification --}}
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                    <span>✅</span> {{ session('success') }}
                </div>
            @endif

            {{-- Error notification --}}
            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                    <span>⚠️</span> {{ session('error') }}
                </div>
            @endif

            {{-- Filter tabs --}}
            <div class="flex gap-2 mb-6">
                <a href="{{ route('admin.posts.index') }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                   {{ request('filter') === null ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    Active
                </a>
                <a href="{{ route('admin.posts.index', ['filter' => 'trashed']) }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                   {{ request('filter') === 'trashed' ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    Trash
                </a>
                <a href="{{ route('admin.posts.index', ['filter' => 'all']) }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition
                   {{ request('filter') === 'all' ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    All
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-xl border-l-4 border-slate-500 p-5 shadow-sm">
                    <p class="text-xs text-slate-500 uppercase tracking-wide">Total (this page)</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $posts->total() }}</p>
                </div>
                <div class="bg-white rounded-xl border-l-4 border-green-500 p-5 shadow-sm">
                    <p class="text-xs text-slate-500 uppercase tracking-wide">Published</p>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $posts->where('status', 'published')->count() }}</p>
                </div>
                <div class="bg-white rounded-xl border-l-4 border-yellow-500 p-5 shadow-sm">
                    <p class="text-xs text-slate-500 uppercase tracking-wide">Pending</p>
                    <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $posts->where('status', 'pending')->count() }}</p>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">#</th>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">Title</th>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">Author</th>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">Status</th>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">Deleted</th>
                            <th class="p-4 text-xs font-semibold text-slate-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr class="border-t border-slate-100 hover:bg-red-50/40 transition {{ $post->trashed() ? 'opacity-60' : '' }}">
                                <td class="p-4 text-slate-500 text-sm">{{ $post->id }}</td>
                                <td class="p-4 font-medium text-slate-800">{{ $post->title }}</td>
                                <td class="p-4 text-slate-600 text-sm">{{ $post->user->name ?? 'N/A' }}</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium
                                        {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td class="p-4 text-xs text-slate-500">
                                    {{ $post->trashed() ? $post->deleted_at->diffForHumans() : '—' }}
                                </td>
                                <td class="p-4">
                                    <div class="flex gap-2 text-sm flex-wrap">
                                        @if ($post->trashed())
                                            <form method="POST" action="{{ route('admin.posts.restore', $post->id) }}">
                                                @csrf
                                                <button type="submit" class="text-green-600 hover:underline font-medium">Restore</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.posts.forceDelete', $post->id) }}"
                                                  onsubmit="return confirm('Permanently delete this post? This cannot be undone.')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline font-medium">Delete Forever</button>
                                            </form>
                                        @else
                                            <a href="{{ route('admin.posts.edit', $post->id) }}"
                                               class="text-indigo-600 hover:underline font-medium">Edit</a>
                                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}"
                                                  onsubmit="return confirm('Move to trash?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-orange-600 hover:underline font-medium">Trash</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="p-12 text-center text-slate-500">No posts found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $posts->withQueryString()->links() }}
            </div>

        </div>
    </div>
</x-app-layout>