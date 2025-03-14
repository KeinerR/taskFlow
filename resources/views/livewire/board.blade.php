<div class="bg-blue">

    @if ($modal)
    <div id="show" wire:model='modal' class="relative w-190 mx-auto bg-slate-500 p-6 rounded-lg shadow-lg mb-10">
        <button id="closeShow" wire:click='close' class="absolute top-1 right-6 text-white text-lg font-bold hover:text-red-500">x</button>
        <h2 class="text-xl font-semibold mb-4 mt-2 text-center bg-blue-400 shadow-md rounded-lg">{{$title}}</h2>

        <p class="text-white">Name of Board</p>
        <input type="text" class="w-full border border-gray-300 rounded-lg p-2 placeholder-white @error('boardName')border-red-500 @enderror"
               placeholder="Write the name of the board..."
               wire:model="boardName">

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

    <!-- Título principal con margen -->
    <h2 class="text-2xl  font-bold text-center mt-5 mb-5 bg-gray-800 p-6 rounded-lg shadow-lg text-white">Your Boards are Ready! 🚀</h2>

    <!-- Contenedor de los tableros -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-5">
        @forelse ($boards as $board)
            <!-- Tarjeta del Board -->
            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                <h2 class="text-lg font-bold mb-4 text-blue-400">{{ $board->name }}</h2>

                @if ($board->lists->isNotEmpty())
                    @foreach ($board->lists as $list)
                        <div class="bg-gray-700 p-4 rounded-lg shadow mt-4">
                            <p class="text-white font-semibold">{{ $list->name }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-white">No lists available.</p>
                @endif
            </div>
        @empty
            <!-- Mensaje cuando no hay tableros -->
            <div class="col-span-4 flex flex-col justify-center items-center bg-gray-800 p-6 rounded-lg shadow-lg text-white">
                <p class="text-lg font-semibold">Welcome to TaskFlow! 🎉</p>
                <p class="text-sm">Start organizing your tasks—boards are ready for you!</p>
            </div>
        @endforelse
    </div>


    <div class="mt-6 flex flex-col items-center">
    <!-- Mensaje -->
    <p class="text-lg text-gray-600 font-semibold mb-2">Ver más boards 📌</p>

    <!-- Paginador con estilos -->
    <div class="bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ $boards->links() }}
    </div>
</div>


    <!-- Botón flotante para crear un nuevo tablero -->
    <button  @click="$dispatch('openModal',{type:'create'})" class="fixed bottom-5 right-5 bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 cursor-pointer">
        <i class="fa-solid fa-chalkboard"></i>
    </button>
</div>


</div>
