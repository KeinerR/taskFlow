<?php

namespace App\Livewire;

use App\Models\ListModel;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Task extends Component
{


    public $title;
    public $description;
    public $list_id;
    public $status;
    public $priority;
    public $due_date;
    public $created_by;
    public $edited_by;
    public $titleModal='';

    public $modaltask = false; // ✅ Se define la variable pública

    protected function rules()
    {
        return [
            'title' => 'required|min:3',
            'description'=>'required|min:3',
            'status'=>'required',
            'priority'=>'required',
            'due_date' => ['required', 'date', 'after_or_equal:today'],
        ];
    }


    protected function messages()
    {
        return [
            'title.required' => 'The title es required.',
            'title.min' => 'The  title  is too short.',
            'description.required' => 'The title es required.',
            'description.min' => 'The  title  is too short.',
            'status.required' => 'The status of the task.',
            'priority.required' => 'The priority is required.',
            'due_date.required' => 'The priority is required.',
            'due_date.date' => 'The due date must be a valid date.',
            'due_date.after_or_equal' => 'The due date cannot be earlier than today.',
        ];
    }


    public function mount()
    {
        // $this->list_id =ListModel::first()->id;
        $this->list_id =ListModel::all();
        $this->created_by = auth()->user()->id;
        $this->edited_by = auth()->user()->id;
    }

    public function render()
    {
        return view('livewire.task');
    }

    #[On('assignTask')]

    public function assingTask()
    {

        $this->openModalTask();
    }



    public function openModalTask()
    {
        $this->titleModal = 'Assing Task';
        $this->modaltask = !$this->modaltask; // ✅ Alterna entre true y false

    }

    public function closeTask(){

        $this->modaltask = false;
    }

    public function saveTask(){


        $this->validate();

        $lastPosition = User::where('list_id', $this->list_id)->max('position');

        User::create([
            'title' => $this->title,
            'description' => $this->description,
            'list_id' => $this->list_id,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'created_by' => $this->created_by,
            'edited_by' => $this->edited_by,
            'position' => $lastPosition ? $lastPosition + 1 : 1,

        ]);



    }
}
