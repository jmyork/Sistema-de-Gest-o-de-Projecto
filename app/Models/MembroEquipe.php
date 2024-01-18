<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembroEquipe extends Model
{
    protected $primaryKey = 'ID_Membro';

    protected $fillable = ['Nome', 'Cargo', 'Habilidades'];

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'equipe_membro_equipe', 'ID_Membro', 'ID_Equipe');
    }

    public function tarefas()
    {
        return $this->belongsToMany(Tarefa::class, 'tarefa_membro_equipe', 'ID_Membro', 'ID_Tarefa');
    }
}

