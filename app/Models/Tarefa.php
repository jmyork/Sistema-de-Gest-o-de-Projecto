<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $primaryKey = 'ID_Tarefa';

    protected $fillable = ['Descricao', 'Data_Inicio', 'Data_Conclusao_Prevista', 'Status', 'ID_Equipe', 'ID_Membro_Responsavel'];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'ID_Projeto');
    }

    public function membros()
    {
        return $this->belongsToMany(MembroEquipe::class, 'tarefa_membro_equipe', 'ID_Tarefa', 'ID_Membro');
    }

    public function avaliacaoTarefa()
    {
        return $this->hasOne(AvaliacaoTarefa::class, 'ID_Tarefa');
    }
}

