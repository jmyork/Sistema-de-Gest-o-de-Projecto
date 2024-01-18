<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoTarefa extends Model
{
    protected $primaryKey = 'ID_Avaliacao';

    protected $fillable = ['ID_Tarefa', 'Avaliacao', 'Comentarios'];

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class, 'ID_Tarefa');
    }
}

