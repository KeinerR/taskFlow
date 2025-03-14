<?php

namespace App\Livewire;

use Livewire\Component;

class UserMasive extends Component
{


    public $users = [
        ['name' => '', 'email' => ''] // Un campo inicial por defecto
    ];    public $name;
    public $email;
    public $password;
    public $created_by;
    public $edited_by;

    public function render()
    {
        return view('livewire.user-masive');
    }


    public function addUserList()
    {
        $this->users[] = ['name' => '', 'email' => '']; // Agregar ambos campos al mismo tiempo
    }

}
