<img 
    src="{{ $url }}"
    alt="{{ $alt }}"
    class="
        object-cover
        @if ($size === 'xs') size-16
        @elseif ($size === 'sm') size-24
        @elseif ($size === 'md') size-48
        @elseif ($size === 'lg') size-72
        @elseif ($size === 'xl') size-96
        @endif
        @if ($rounded)
            rounded-{{ $rounded }}
        @endif
        {{ $class }}
    "
/>