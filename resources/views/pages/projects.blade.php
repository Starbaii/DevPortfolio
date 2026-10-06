<x-public-layout title="Projects">
    <div class="max-w-6xl mx-auto px-6 py-16">
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">My Projects</h1>
            <p class="text-gray-500">A showcase of things I've built</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($projects as $project)
                <x-project-card :title="$project['title']" :tech="$project['tech']">
                    A great project built with modern tools and best practices.
                    <x-slot name="footer">
                        <a href="{{ route('projects.show', $project['id']) }}"
                           class="text-indigo-600 font-medium hover:underline">
                            View Details →
                        </a>
                    </x-slot>
                </x-project-card>
            @empty
                <p class="text-gray-500">No projects yet.</p>
            @endforelse
        </div>
    </div>
</x-public-layout>