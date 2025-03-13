<div>
    {{-- In work, do what you enjoy. --}}

    <div wire:sortable="updateTaskOrder">
    @foreach ($tasks as $task)
        <div wire:sortable.item="{{ $task->id }}" class="bg-gray-700 text-white p-2 rounded mt-2">
            {{ $task->title }}
        </div>
    @endforeach
</div>

</div>
