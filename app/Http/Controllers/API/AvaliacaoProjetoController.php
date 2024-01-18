<?php

// Em app/Http/Controllers/API/AvaliacaoProjetoController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AvaliacaoProjeto;
use Illuminate\Http\Request;

class AvaliacaoProjetoController extends Controller
{
    public function index()
    {
        $avaliacoesProjetos = AvaliacaoProjeto::all();
        return response()->json($avaliacoesProjetos, 200);
    }

    // AvaliacaoProjetoController (app/Http/Controllers/API/AvaliacaoProjetoController.php)

    public function show(AvaliacaoProjeto $avaliacaoProjeto)
    {
        $avaliacaoProjeto::with('projeto');

        return response()->json($avaliacaoProjeto, 200);
    }


    public function store(Request $request)
    {
        $avaliacaoProjeto = AvaliacaoProjeto::create($request->all());
        return response()->json($avaliacaoProjeto, 201);
    }

    public function update(Request $request, AvaliacaoProjeto $avaliacaoProjeto)
    {
        $avaliacaoProjeto->update($request->all());
        return response()->json($avaliacaoProjeto, 200);
    }

    public function destroy(AvaliacaoProjeto $avaliacaoProjeto)
    {
        $avaliacaoProjeto->delete();
        return response()->json(null, 204);
    }
}
