<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $primaryKey = 'ID_Equipe';

    protected $fillable = ['Nome', 'Descricao'];

    public function membros()
    {
        return $this->belongsToMany(MembroEquipe::class, 'equipe_membro_equipe', 'ID_Equipe', 'ID_Membro');
    }

    public function projetos()
    {
        return $this->belongsToMany(Projeto::class, 'projeto_equipe', 'ID_Equipe', 'ID_Projeto');
    }

    public function avaliacaoEquipe()
    {
        return $this->hasOne(AvaliacaoEquipe::class, 'ID_Equipe');
    }
}
