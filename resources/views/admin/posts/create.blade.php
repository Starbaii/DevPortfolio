<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800">🛡️ Admin · Add New Post</h2>
                <p class="text-sm text-gray-500 mt-1">Create a post directly as an admin</p>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">
                ← Back to Posts
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <p class="font-semibold mb-1">⚠️ Please fix these errors:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.posts.store') }}"
                  class="space-y-5 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           placeholder="Post title"
                           class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm @error('title') border-red-400 @enderror">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Body</label>
                    <textarea name="body" rows="10" placeholder="Write the post content..."
                              class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm @error('body') border-red-400 @enderror">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg font-medium transition shadow-sm">
                        Create Post
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