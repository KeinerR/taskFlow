<x-layouts.app title="Dashboard">

    <div class="flex flex-col h-full w-full p-6 gap-6 bg-gray-900 text-white">

        @livewire('list-model')
        @livewire('board')
        @livewire('task')







        <!-- <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('assignTask', (event) => {
            console.log('✅ Evento post-created detectado por Livewire 3', event);
        });
    });
</script> -->


    </div>



</x-layouts.app>
