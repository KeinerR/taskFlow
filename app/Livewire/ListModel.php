<?php

namespace App\Livewire;

use App\Models\ListModel as ModelsListModel;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ListModel extends Component
{

    public $id;

    public ModelsListModel $list;

    public $listName='';

    protected function rules()
    {
        return [

            'listName' => 'required|min:3',
        ];
    }



    #[On('createList')] // Escucha el evento 'createList'
    public function createList($boardId) // ✅ Recibe directamente el valor
    {


        $this->id = $boardId; // Asigna el ID a la propiedad pública
        $this->dispatch('open-modal');

    }

    public function render()
    {
        return view('livewire.list-model');
    }

    public function saveList()
    {

        $lastPosition = ModelsListModel::where('board_id', $this->id)->max('position');

        ModelsListModel::create([
            'name' => $this->listName,
            'board_id' => $this->id, // Asociar la lista al board
            'position' => $lastPosition ? $lastPosition + 1 : 1, // Incrementar posición

        ]);


        $this->close();
    }

    public function close(){


        $this->reset(['listName','id']); // Limpiar el campo
        // Cerrar el modal
        $this->dispatch('close-modal');
        $this->dispatch('shownotificacion');

    }
}
