<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory

class ListModel extends Model
{
    use HasFactory; // Usa el trait correctamente

    protected $table = 'list_models';

    protected $fillable = ['name',  'position'];

    // Relación: Una lista pertenece a un tablero
    public function boards()
    {
        return $this->belongsToMany(Board::class, 'board_list', 'list_id', 'board_id');
    }

    // Relación: Una lista tiene muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
