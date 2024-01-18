<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoEquipe extends Model
{
    protected $primaryKey = 'ID_Avaliacao';

    protected $fillable = ['ID_Equipe', 'Avaliacao_Geral', 'Comentarios'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'ID_Equipe');
    }
}

