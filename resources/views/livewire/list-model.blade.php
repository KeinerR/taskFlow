<div>
<!-- Notificación -->
<div x-data="{ show: false }"
         x-on:shownotificacion.window="show = true; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="rounded-lg bg-slate-700 py-4 px-4 text-center fixed top-4 right-4 text-white shadow-lg">
        List created successfully
    </div>

    <div class="flex items-center justify-between">

        <!-- Contenedor del modal con Alpine.js -->
        <div x-data="{ open: false }"
             x-on:close-modal.window="open = false"
             x-on:open-modal.window="open = true"> <!-- Escucha el evento 'open-modal' -->
            <!-- Botón para abrir el modal -->

            <!-- Modal -->
            <div class="  fixed inset-0 flex items-center justify-center z-50" x-show="open">
                <div class=" relative bg-slate-700 p-6 rounded-lg shadow-lg w-1/3">
                <button id="closeShow" wire:click='close'  class="absolute top-1 right-6 text-white text-lg font-bold hover:text-red-500">x</button>

                    <h2 class="text-xl font-semibold mb-4 text-center bg-blue-400 shadow-md rounded-lg mt-2.5">Create List</h2>
                    <p class="text-white">Name of List</p>

                    <!-- Campo de entrada para el nombre de la lista -->
                    <input type="text" class="w-full border border-gray-300 rounded-lg p-2 placeholder-white"
                           placeholder="Name of List"
                           wire:model="listName"> <!-- Enlazado a la propiedad listName -->

                    <!-- Botón para guardar y cerrar el modal -->
                    <div class="flex justify-center p-2.5">
                        <button wire:click="saveList" x-on:click="open = false"
                                class="bg-slate-800 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-slate-700 transition duration-300 cursor-pointer">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
