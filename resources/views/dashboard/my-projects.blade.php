<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    My Projects 📁
                </h2>
                <p class="text-sm text-gray-500 mt-1">Manage all your portfolio projects</p>
            </div>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded-lg font-medium transition shadow-sm">
                + New Project
            </button>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Stat summary --}}
            <div class="grid sm:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Total</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ count($myProjects) }}</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Completed</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">
                        {{ collect($myProjects)->where('status', 'Completed')->count() }}
                    </p>
                </div>
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">In Progress</p>
                    <p class="text-2xl font-bold text-yellow-600 mt-1">
                        {{ collect($myProjects)->where('status', 'In Progress')->count() }}
                    </p>
                </div>
            </div>

            {{-- Project table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tech</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Visibility</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($myProjects as $proj)
                            <tr class="border-t border-gray-100 hover:bg-indigo-50/40 transition">
                                <td class="p-4 text-gray-500 text-sm">{{ $proj['id'] }}</td>
                                <td class="p-4 font-medium text-gray-800">{{ $proj['title'] }}</td>
                                <td class="p-4 text-gray-600 text-sm">{{ $proj['tech'] }}</td>
                                <td class="p-4">
                                    @php
                                        $colors = [
                                            'Completed' => 'bg-green-100 text-green-700',
                                            'In Progress' => 'bg-yellow-100 text-yellow-700',
                                            'Draft' => 'bg-gray-100 text-gray-600',
                                        ];
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $colors[$proj['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                        {{ $proj['status'] }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="text-xs font-medium {{ $proj['visibility'] === 'Public' ? 'text-indigo-600' : 'text-gray-400' }}">
                                        {{ $proj['visibility'] === 'Public' ? '🌐 Public' : '🔒 Private' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>