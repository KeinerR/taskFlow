<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'list_id', 'user_id', 'status', 'priority', 'due_date'];

    // Relación: Una tarea pertenece a una lista
    public function list()
    {
        return $this->belongsTo(ListModel::class);
    }

    // Relación: Una tarea puede tener un usuario asignado
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: Una tarea puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
