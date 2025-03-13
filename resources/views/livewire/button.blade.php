<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <button
    class="{{ $color }} text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:opacity-80 transition"
    @if($action) wire:click="{{ $action }}" @endif
>
    {{ $label }}
</button>

</div>
