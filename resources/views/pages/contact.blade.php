<x-public-layout title="Contact">
    <div class="max-w-2xl mx-auto px-6 py-16">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Contact Me</h1>
            <p class="text-gray-500">Have a project in mind? Send me a message.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}"
              class="space-y-5 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Your full name"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="you@example.com"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Message</label>
                <textarea name="message" rows="6"
                          placeholder="Tell me about your project..."
                          class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md hover:shadow-lg">
                Send Message
            </button>
        </form>
    </div>
</x-public-layout>