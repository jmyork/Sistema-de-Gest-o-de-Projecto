<?php

// Em app/Http/Controllers/API/TarefaController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas, 200);
    }

    // TarefaController (app/Http/Controllers/API/TarefaController.php)

    public function show(Tarefa $tarefa)
    {
        $tarefa::with('projeto', 'membros', 'avaliacaoTarefa');

        return response()->json($tarefa, 200);
    }

    public function store(Request $request)
    {
        $tarefa = Tarefa::create($request->all());
        return response()->json($tarefa, 201);
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update($request->all());
        return response()->json($tarefa, 200);
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->json(null, 204);
    }
}
