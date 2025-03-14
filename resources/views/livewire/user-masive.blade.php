<div>
    <div class="grid grid-cols-2 gap-4">
        <!-- Campo de Nombres -->
        <div class="flex flex-col">
            <label class="block font-bold">Name student</label>
            <div>
                @foreach ($users as $index => $user)
                    <div class="flex items-center mt-2">
                        <input type="text" wire:model="users.{{ $index }}.name"
                               class="w-full border border-gray-300 rounded-lg p-2 placeholder-white"
                               placeholder="Write the name of the user...">
                    </div>
                @endforeach
                <button type="button" wire:click="addUserList"
                        class="bg-slate-900 text-white font-semibold py-2 px-4 rounded-lg shadow-md mt-2
                        hover:bg-slate-700 transition duration-300 cursor-pointer">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            @error('name')
            <div class="mt-1 text-sm text-red-500">
                <span class="text-xs">{{ $message }}</span>
            </div>
            @enderror
        </div>

        <!-- Campo de Emails -->
        <div class="flex flex-col">
            <label class="block font-bold">Email student</label>
            <div>
                @foreach ($users as $index => $user)
                    <div class="flex items-center mt-2">
                        <input type="email" wire:model="users.{{ $index }}.email"
                               class="w-full border border-gray-300 rounded-lg p-2 placeholder-white"
                               placeholder="Write the email of the user...">
                    </div>
                @endforeach
                <button type="button" wire:click="addUserList"
                        class="bg-slate-900 text-white font-semibold py-2 px-4 rounded-lg shadow-md mt-2
                        hover:bg-slate-700 transition duration-300 cursor-pointer">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            @error('email')
            <div class="mt-1 text-sm text-red-500">
                <span class="text-xs">{{ $message }}</span>
            </div>
            @enderror
        </div>
    </div>
</div>
