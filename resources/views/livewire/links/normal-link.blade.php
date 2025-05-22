<a
    href="{{ $link }}"
    class="text-sm underline"
    @if ($wireNavigate) wire:navigate @endif
>
    {{ $text }}
</a>
