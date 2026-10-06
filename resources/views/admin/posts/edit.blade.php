<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800">🛡️ Admin · Edit Post</h2>
                <p class="text-sm text-gray-500 mt-1">Post ID: {{ $post->id }}</p>
            </div>
            <a href="{{ route('admin.posts.index') }}"
               class="text-sm text-gray-500 hover:text-indigo-600 transition">
                ← Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}"
                  class="space-y-5 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Body</label>
                    <textarea name="body" rows="10"
                              class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm">{{ old('body', $post->body) }}</textarea>
                    @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="pending" {{ old('status', $post->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg font-medium transition shadow-sm">
                        Update Post
                    </button>
                    <a href="{{ route('admin.posts.index') }}"
                       class="px-6 py-2.5 rounded-lg font-medium text-gray-600 border border-gray-300 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>