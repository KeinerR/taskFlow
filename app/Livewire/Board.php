<?php

namespace App\Livewire;

use App\Models\Board as ModelsBoard;
use App\Models\ListModel;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Board extends Component
{

    use WithPagination; // 👈 Habilitar paginación en Livewire

    public ModelsBoard $board;
    public $boardName;
    public $title = '';
    public $modal = false;


    protected function rules()
    {
        return [
            'boardName' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'boardName.required' => 'The name of the board is required.',
        ];
    }


    public function render()
    {

        return view('livewire.board', [
            'boards' => ModelsBoard::paginate(8) // 👈 Livewire manejará la paginación
        ]);
    }




    #[On('openModal')]
    public function openModal($type = null)
    {


        if ($this->modal==false) {
            $this->modal = true;
        }else if($this->modal==true){
            $this->modal = false;
        }

        if ($type == 'create') {
           $this-> createBoard();
        }



    }


    public function createBoard()
    {
        $this->title = 'Create a new board';
        $this->board = new ModelsBoard();
        $this->boardName = ''; // Limpiar el nombre del tablero

    }

    #[On('editBoard')] // Escucha el evento
    public function editBoard(ModelsBoard $board)
    {
       $this->title = 'Edit  board';
         $this->board = $board;
         $this->boardName = $board->name;
        $this->openModal();
    }








    public function saveData(){


        $this->validate();
        $user_id = auth()->user()->id;

        $boardCreated = ModelsBoard::updateOrCreate(
            ['id' => $this->board->id],
            ['name' => $this->boardName, 'user_id' => $user_id]
        );

        $defaultLists = [
            ['name' => 'To Do', 'position' => 1],
            ['name' => 'In Progress', 'position' => 2],
            ['name' => 'Done', 'position' => 3]
        ];

        $listIds = [];
        foreach ($defaultLists as $list) {
            $listModel = ListModel::firstOrCreate(['name' => $list['name']], ['position' => $list['position']]);
            $listIds[] = $listModel->id;
        }


        $boardCreated->lists()->sync($listIds);


        $this->close();

    }



    public function close(){

        $this->reset('boardName');
       $this-> openModal();

    }
}
