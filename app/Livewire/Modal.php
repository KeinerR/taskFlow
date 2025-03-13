<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    public $open = false;
    public $title = '';
    public $buttonText = '';


    public function render()
    {
        return view('livewire.modal');
    }

}
