<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskList extends Component
{

    public $list;

    protected $listeners = ['taskAdded' => 'render'];

    public function render()
    {
        $tasks = Task::where('list_id', $this->list->id)->orderBy('priority', 'asc')->get();

        return view('livewire.task-list', compact('tasks'));
    }
    public function updateTaskOrder($orderedTasks)
{
    foreach ($orderedTasks as $index => $task) {
        Task::where('id', $task['value'])->update([
            'list_id' => $this->list->id,
            'priority' => $index + 1
        ]);
    }

    $this->render();
}

}
