<div>

 <!-- Notificación -->
            <div x-data="{ show: false }"
                    x-on:shownotificacion.window="show = true; setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="rounded-lg bg-slate-700 py-4 px-4 text-center fixed top-4 right-4 text-white shadow-lg">
                    List created successfully
                </div>
    {{-- Success is as dangerous as failure. --}}
    <div class="bg-blue" >
        <!-- Modal -->

        @if ($modal)
        <div id="show" wire:model='modal' class="relative w-96 mx-auto bg-slate-500 p-6 rounded-lg shadow-lg ">
                    <button id="closeShow" wire:click='close'  class="absolute top-1 right-6 text-white text-lg font-bold hover:text-red-500">x</button>

                    <h2 class="text-xl font-semibold mb-4 mt-2 text-center bg-blue-400 shadow-md rounded-lg">{{$title}}</h2>

                    <p class="text-white">Name of Board</p>
                    <input type="text" class="w-full border border-gray-300 rounded-lg p-2 placeholder-white    @error('boardName')border-red-500 @enderror "
                     placeholder="Write the name of the board..."
                     wire:model="boardName">

                   <!-- Mensajes de error -->
                    @error('boardName')
                        <div class="mt-1 text-sm text-red-500">
                            <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                </svg>
                                <span class="text-xs">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror



            <div class="flex justify-center p-2.5">
                <button wire:click="saveData"
                   class="bg-slate-800 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-slate-700 transition duration-300 cursor-pointer">
                  Save
                </button>
            </div>
        </div>


        @endif


    </div>

        <div class=" relative flex gap-6 overflow-x-auto">
            {{-- boards --}}
            @foreach ($boards as $board)
                <div class="min-w-[300px] bg-gray-800 p-4 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold mb-4 text-blue-400">{{ $board->name }}</h2>
                        <!-- <button onclick="window.Livewire.dispatch('editBoard', { board: {{ json_encode($board) }} })"
                        class="absolute top-2 right-2 text-slate-900 hover:text-gray-200">
                        <i class="fa-regular fa-pen-to-square"></i>
                        </button> -->

                        <!-- <button onclick="window.Livewire.dispatch('createList', { board: {{ json_encode($board->id) }} })" > create</button> -->
                                    <!-- <button onclick="window.Livewire.dispatch('createList', { boardId: {{ $board->id }} })">
                                        Create
                            </button> -->
                    @if ($board->lists->isNotEmpty())
                        @foreach ($board->lists as $list)
                            <div class="bg-gray-700 p-4 rounded-lg shadow mt-4">
                                <p class="text-white font-semibold">{{ $list->name }}</p>
                                @if ($list->name === 'To Do')
                                    <!-- <button onclick="window.Livewire.dispatch('assignTask', { : {{ json_encode($list->id) }} })" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-2 w-full flex items-center justify-center gap-2">
                                        Agregar Tarea <i class="fa-solid fa-plus"></i>
                                    </button> -->
                                @endif

                            </div>
                        @endforeach
                    @else
                        <p class="text-white">No lists available.</p>
                    @endif
                </div>
            @endforeach

        </div>

</div>
