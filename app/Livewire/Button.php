<?php

namespace App\Livewire;

use Livewire\Component;

class Button extends Component
{

    public $label;
    public $color;
    public $action;

    public function mount($label = 'Click', $color = 'bg-blue-600', $action = '')
    {
        $this->label = $label;
        $this->color = $color;
        $this->action = $action;
    }
    public function render()
    {
        return view('livewire.button');
    }
}
