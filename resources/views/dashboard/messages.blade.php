<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Messages 📬
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">From</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</th>
                            <th class="p-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $msg)
                            <tr class="border-t border-gray-100 hover:bg-indigo-50/40 transition">
                                <td class="p-4 font-medium text-gray-800">{{ $msg['from'] }}</td>
                                <td class="p-4 text-gray-600">{{ $msg['subject'] }}</td>
                                <td class="p-4 text-gray-500 text-sm">{{ $msg['date'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-8 text-center text-gray-500">No messages yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>