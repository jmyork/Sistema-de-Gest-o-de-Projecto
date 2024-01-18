<?php

// Em app/Http/Controllers/API/AvaliacaoTarefaController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AvaliacaoTarefa;
use Illuminate\Http\Request;

class AvaliacaoTarefaController extends Controller
{
    public function index()
    {
        $avaliacoesTarefas = AvaliacaoTarefa::all();
        return response()->json($avaliacoesTarefas, 200);
    }

    // AvaliacaoTarefaController (app/Http/Controllers/API/AvaliacaoTarefaController.php)

    public function show(AvaliacaoTarefa $avaliacaoTarefa)
    {
        $avaliacaoTarefa::with('tarefa');

        return response()->json($avaliacaoTarefa, 200);
    }


    public function store(Request $request)
    {
        $avaliacaoTarefa = AvaliacaoTarefa::create($request->all());
        return response()->json($avaliacaoTarefa, 201);
    }

    public function update(Request $request, AvaliacaoTarefa $avaliacaoTarefa)
    {
        $avaliacaoTarefa->update($request->all());
        return response()->json($avaliacaoTarefa, 200);
    }

    public function destroy(AvaliacaoTarefa $avaliacaoTarefa)
    {
        $avaliacaoTarefa->delete();
        return response()->json(null, 204);
    }
}
