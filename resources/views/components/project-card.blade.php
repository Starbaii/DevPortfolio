<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md p-6 border border-gray-200']) }}>
    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h2>
    <p class="text-gray-600 mb-4">Tech: {{ $tech }}</p>

    {{-- $slot: default content --}}
    <div class="text-gray-600 mb-4">
        {{ $slot }}
    </div>

    {{-- Named slot: footer --}}
    @if (isset($footer))
        <div class="border-t pt-3 mt-3">
            {{ $footer }}
        </div>
    @endif
</div>