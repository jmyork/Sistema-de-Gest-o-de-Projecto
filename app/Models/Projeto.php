<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $primaryKey = 'ID_Projeto';

    protected $fillable = ['Nome', 'Descricao', 'Data_Inicio', 'Data_Conclusao_Prevista', 'Orcamento'];

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'projeto_equipe', 'ID_Projeto', 'ID_Equipe');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'ID_Projeto');
    }

    public function avaliacaoProjeto()
    {
        return $this->hasOne(AvaliacaoProjeto::class, 'ID_Projeto');
    }
}
