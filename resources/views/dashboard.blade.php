<x-layouts.app title="Dashboard">

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">











        @livewire('list-model')
        @livewire('task')
        @livewire('board')





        <!-- <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('editBoard', (event) => {
            console.log('✅ Evento post-created detectado por Livewire 3', event);
        });
    });
</script> -->


    </div>



</x-layouts.app>
