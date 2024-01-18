<?php

// Em app/Http/Controllers/API/AvaliacaoEquipeController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AvaliacaoEquipe;
use Illuminate\Http\Request;

class AvaliacaoEquipeController extends Controller
{
    public function index()
    {
        $avaliacoesEquipes = AvaliacaoEquipe::all();
        return response()->json($avaliacoesEquipes, 200);
    }

    // AvaliacaoEquipeController (app/Http/Controllers/API/AvaliacaoEquipeController.php)

    public function show(AvaliacaoEquipe $avaliacaoEquipe)
    {
        $avaliacaoEquipe::with('equipe');

        return response()->json($avaliacaoEquipe, 200);
    }

    public function store(Request $request)
    {
        $avaliacaoEquipe = AvaliacaoEquipe::create($request->all());
        return response()->json($avaliacaoEquipe, 201);
    }

    public function update(Request $request, AvaliacaoEquipe $avaliacaoEquipe)
    {
        $avaliacaoEquipe->update($request->all());
        return response()->json($avaliacaoEquipe, 200);
    }

    public function destroy(AvaliacaoEquipe $avaliacaoEquipe)
    {
        $avaliacaoEquipe->delete();
        return response()->json(null, 204);
    }
}
