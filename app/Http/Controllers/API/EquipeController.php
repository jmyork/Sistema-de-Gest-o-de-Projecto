<?php

// Em app/Http/Controllers/API/EquipeController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::all();
        return response()->json($equipes, 200);
    }

    // EquipeController (app/Http/Controllers/API/EquipeController.php)

    public function show(Equipe $equipe)
    {
        $equipe::with('membros', 'projetos', 'avaliacaoEquipe');

        return response()->json($equipe, 200);
    }


    public function store(Request $request)
    {
        $equipe = Equipe::create($request->all());
        return response()->json($equipe, 201);
    }

    public function update(Request $request, Equipe $equipe)
    {
        $equipe->update($request->all());
        return response()->json($equipe, 200);
    }

    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return response()->json(null, 204);
    }
}
