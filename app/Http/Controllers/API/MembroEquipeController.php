<?php

// Em app/Http/Controllers/API/MembroEquipeController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MembroEquipe;
use Illuminate\Http\Request;

class MembroEquipeController extends Controller
{
    public function index()
    {
        $membrosEquipe = MembroEquipe::all();
        return response()->json($membrosEquipe, 200);
    }

    // MembroEquipeController (app/Http/Controllers/API/MembroEquipeController.php)

    public function show(MembroEquipe $membroEquipe)
    {
        $membroEquipe::with('equipes', 'tarefas');

        return response()->json($membroEquipe, 200);
    }


    public function store(Request $request)
    {
        $membroEquipe = MembroEquipe::create($request->all());
        return response()->json($membroEquipe, 201);
    }

    public function update(Request $request, MembroEquipe $membroEquipe)
    {
        $membroEquipe->update($request->all());
        return response()->json($membroEquipe, 200);
    }

    public function destroy(MembroEquipe $membroEquipe)
    {
        $membroEquipe->delete();
        return response()->json(null, 204);
    }
}
