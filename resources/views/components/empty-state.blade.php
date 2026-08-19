@props(['message', 'actionUrl' => null, 'actionText' => null])

<div class="text-center bg-white border border-dashed border-gray-300 rounded-lg py-12 px-6">
    <p class="text-gray-500">{{ $message }}</p>

    @if ($actionUrl)
        <a href="{{ $actionUrl }}" class="mt-3 inline-block text-indigo-600 hover:underline text-sm font-medium">
            {{ $actionText }} &rarr;
        </a>
    @endif
</div>
