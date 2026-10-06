<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800">Submit a Post ✍️</h2>
                <p class="text-sm text-gray-500 mt-1">Your post will be reviewed by an admin before publishing.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">
                ← Back to Dashboard
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

            <form method="POST" action="{{ route('posts.store') }}"
                  class="space-y-5 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           placeholder="Enter a title"
                           class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm
                           @error('title') border-red-400 @enderror">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Body</label>
                    <textarea name="body" rows="8" placeholder="Write your post content..."
                              class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm
                              @error('body') border-red-400 @enderror">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg font-medium transition shadow-sm">
                        Submit Post
                    </button>
                    <a href="{{ route('dashboard') }}"
                       class="px-6 py-2.5 rounded-lg font-medium text-gray-600 border border-gray-300 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>