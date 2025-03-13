<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'task_id', 'user_id'];

    // Relación: Un comentario pertenece a una tarea
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // Relación: Un comentario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
