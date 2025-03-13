<?php

namespace App\Livewire;

use App\Models\Board as ModelsBoard;
use App\Models\ListModel;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Board extends Component
{


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

        $boards = ModelsBoard::all();
        return view('livewire.board', compact('boards'));
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

       $boardCreated= ModelsBoard::updateOrCreate(['id'=>$this->board->id],[
           'name' =>$this->boardName,
           'user_id' => $user_id

        ]);


        if ($boardCreated->wasRecentlyCreated) {
            $this->saveDefaultLists($boardCreated->id);
        }


        $this->close();

    }


        public function saveDefaultLists($boardId)
        {
            // Listas predeterminadas con su posición
            $defaultLists = [
                ['name' => 'To Do', 'position' => 1],
                ['name' => 'In Progress', 'position' => 2],
                ['name' => 'Done', 'position' => 3]
            ];

            foreach ($defaultLists as $list) {
                ListModel::create([
                    'name' => $list['name'],
                    'board_id' => $boardId,
                    'position' => $list['position']
                ]);
            }
            $this->dispatch('shownotificacion');

            return redirect()->route('dashboard'); // Ajusta el nombre de la ruta según tu proyecto

        }
    public function close(){

        $this->reset('boardName');
       $this-> openModal();

    }
}
