<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    // Relación: Un tablero pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Un tablero tiene muchas listas
    public function lists()
    {
        return $this->belongsToMany(ListModel::class, 'board_list', 'board_id', 'list_id');
    }

}
