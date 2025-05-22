<button
    type="button"
    class="
        mt-auto
        bg-blue-600
        hover:bg-blue-500
        cursor-pointer
        text-white
        py-3
        px-6
        transition-all
        duration-300
        focus:outline-none
        focus:ring-2
        focus:ring-blue-500
        focus:ring-opacity-50
        {{ $class }}
    "
    @if (!$data)
        wire:click="$dispatch('{{ $actionEvent }}')"
        wire:keydown.enter="$dispatch('{{ $actionEvent }}')"
    @else
        wire:click="$dispatch(
            '{{ $actionEvent }}',
            {{ $data }}
        )"
        wire:keydown.enter="$dispatch(
            '{{ $actionEvent }}',
            {{ $data }}
        )"
    @endif
>
    {{ $text }}
</button>