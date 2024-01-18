<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoProjeto extends Model
{
    protected $primaryKey = 'ID_Avaliacao';

    protected $fillable = ['ID_Projeto', 'Avaliacao_Geral', 'Comentarios'];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'ID_Projeto');
    }
}

