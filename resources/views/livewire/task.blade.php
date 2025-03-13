<div>
    <form wire:submit.prevent="saveTask">
        <input type="text" wire:model="title" placeholder="Título" class="w-full p-2 border">
        <textarea wire:model="description" placeholder="Descripción" class="w-full p-2 border"></textarea>

        <select wire:model="list_id" class="w-full p-2 border">
            <option value="">Selecciona una lista</option>
            @foreach ($lists as $list)
                <option value="{{ $list->id }}">{{ $list->name }}</option>
            @endforeach
        </select>

        <select wire:model="user_id" class="w-full p-2 border">
            <option value="">Asignar usuario</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <input type="text" wire:model="status" placeholder="Estado" class="w-full p-2 border">
        <input type="text" wire:model="priority" placeholder="Prioridad" class="w-full p-2 border">
        <input type="date" wire:model="due_date" class="w-full p-2 border">

        <button type="submit" class="mt-2 p-2 bg-blue-500 text-white">Guardar Tarea</button>
    </form>
</div>
