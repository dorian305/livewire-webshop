<a
    href="{{ $link }}"
    class="px-4 inline-flex items-center h-12 border transition-colors {{ $class ?? 'bg-white hover:bg-gray-200' }} {{ $class }}"
    wire:navigate
>
    <span class="flex-grow text-center">{{ $text }}</span>
</a>