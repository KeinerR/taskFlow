<div>
    <!-- ✅ El modal se controla con Livewire -->
    <div class="bg-blue " >
        <!-- Modal -->

        @if ($modaltask)
            <div wire:model="modaltask" class="relative w-200 mx-auto bg-slate-500 p-6 rounded-lg shadow-lg  ">
            <button id="closeShow" wire:click='closeTask'  class="absolute top-1 right-6 text-white text-lg font-bold hover:text-red-500">x</button>
            <h2 class="text-xl font-semibold mb-4 mt-2 text-center bg-blue-400 shadow-md rounded-lg">{{$titleModal}}</h2>


            <div class="grid grid-cols-2 gap-4">

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block font-bold">Title</label>
                        <input type="text" wire:model="title" class="w-full  border border-gray-300 rounded-lg p-2 placeholder-white   @error('title')border-red-500 @enderror " placeholder="Write the title of the task...">

                        @error('title')
                        <div class="mt-1 text-sm text-red-500">
                            <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                </svg>
                                <span class="text-xs">{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                            <label class="block font-bold">Description</label>
                            <textarea wire:model="description" class="w-full  border border-gray-300 rounded-lg p-2 placeholder-white  @error('description')border-red-500 @enderror  " placeholder="Wrirte a short description of the task "></textarea>
                            @error('description')
                            <div class="mt-1 text-sm text-red-500">
                                <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <!-- Assign to User -->


                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block font-bold">Status</label>
                        <select wire:model="status" class="w-full p-2 border rounded text-white @error('status') border-red-500 @enderror ">
                            <option class="text-slate-900" value="">Select a status</option>
                            <option class="text-slate-900" value="pending">Pending</option>
                            <option class="text-slate-900" value="in_progress">In Progress</option>
                            <option class="text-slate-900" value="completed">Completed</option>
                        </select>
                        @error('status')
                            <div class="mt-1 text-sm text-red-500">
                                <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <!-- Priority -->
                    <div class="mb-4">
                        <label class="block font-bold">Priority</label>
                        <select wire:model="priority" class="w-full p-2 border rounded text-white @error('priority') border-red-500 @enderror ">
                            <option class="text-slate-900" value="">Select a priority</option>
                            <option class="text-slate-900" value="low">Low</option>
                            <option class="text-slate-900" value="medium">Medium</option>
                            <option class="text-slate-900" value="high">High</option>
                        </select>
                        @error('priority')
                            <div class="mt-1 text-sm text-red-500">
                                <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror                      </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label class="block font-bold">Due Date</label>
                        <input type="date" wire:model="due_date" class="w-full p-2 border rounded @error('due_date') border-red-500 @enderror ">
                        @error('due_date')
                            <div class="mt-1 text-sm text-red-500">
                                <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                    </div>


                     <!-- List -->
                     <div class="mb-4">
                        <label class="block font-bold">List of the board</label>
                        <select wire:model="list_id" class="w-full p-2 border rounded text-white @error('due_date') border-red-500 @enderror ">
                            <option class="text-slate-900" value="">Select a list</option>
                            @foreach ($list_id as $list)
                            <option class="text-slate-900" value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                        </select>
                        @error('list_id')
                            <div class="mt-1 text-sm text-red-500">
                                <div class="inline-flex items-center bg-white px-2 py-1 rounded-md shadow">
                                    <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m1.41 1.41a10 10 0 010 14.14m-1.41 1.41a10 10 0 01-14.14 0m-1.41-1.41a10 10 0 010-14.14"></path>
                                    </svg>
                                    <span class="text-xs">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror                       </div>



            </div>
             <div class="mb-4">
                       @livewire('user-masive')
             </div>



             <div class="flex justify-center p-2.5">
                        <button wire:click="saveTask"
                                class="bg-slate-900 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-slate-700 transition duration-300 cursor-pointer">
                            Save
                        </button>
                    </div>
        @endif
    </div>

    <!-- Botón para abrir el modal -->
</div>
