<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa el trait HasFactory

class ListModel extends Model
{
    use HasFactory; // Usa el trait correctamente

    protected $table = 'list_models';

    protected $fillable = ['name', 'board_id', 'position'];

    // Relación: Una lista pertenece a un tablero
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    // Relación: Una lista tiene muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
