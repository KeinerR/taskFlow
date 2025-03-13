<?php

namespace App\Livewire;

use App\Models\ListModel;
use App\Models\Task as ModelsTask;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Task extends Component
{



    public function render()
    {
        return view('livewire.task');
    }

    public $title, $description, $list_id, $user_id, $status, $priority, $due_date;
    public $lists, $users;

    public function mount()
    {
        $this->lists = ListModel::all(); // Obtener listas
        $this->users = User::all(); // Obtener usuarios
    }

    public function saveTask()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'list_id' => 'required|exists:list_models,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'priority' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        ModelsTask::create([
            'title' => $this->title,
            'description' => $this->description,
            'list_id' => $this->list_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
        ]);

        $this->reset(); // Limpiar el formulario
        // $this->dispatch('taskAdded'); // Evento para actualizar la lista de tareas
    }

    // #[On('assignTask')]

    // public function assingTask($list_id)
    // {

    //     $this->list_id= $list_id;
    //     $this->openModalTask();
    // }



    // public function openModalTask()
    // {
    //     $this->titleModal = 'Assing Task';
    //     $this->modaltask = !$this->modaltask; // ✅ Alterna entre true y false

    // }

    // public function closeTask(){

    //     $this->modaltask = false;
    // }

    // public function saveTask(){

    // }
}
