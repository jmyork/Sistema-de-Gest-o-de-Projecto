<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::all();
        return response()->json($projetos, 200);
    }

    public function show(Projeto $projeto)
    {
        $projeto->load('equipes', 'tarefas', 'avaliacaoProjeto');
        return response()->json($projeto, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['Nome', 'Descricao', 'Data_Inicio', 'Data_Conclusao_Prevista', 'Orcamento']), [
            'Nome' => 'required|string|max:255',
            'Descricao' => 'nullable|string',
            'Data_Inicio' => 'required|date',
            'Data_Conclusao_Prevista' => 'nullable|date',
            'Orcamento' => 'nullable|numeric',
            // Adicione outras regras de validação conforme necessário
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $projeto = Projeto::create(array_merge($validator->validated(), ['ID_Usuario_Criador' => auth()->id()]));
        return response()->json($projeto, 201);
    }

    public function update(Request $request, Projeto $projeto)
    {
        $validator = Validator::make($request->all(), [
            'Nome' => 'required|string|max:255',
            'Descricao' => 'nullable|string',
            'Data_Inicio' => 'required|date',
            'Data_Conclusao_Prevista' => 'nullable|date',
            'Orcamento' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $projeto->update($request->all());
        return response()->json($projeto, 200);
    }

    public function destroy(Projeto $projeto)
    {
        $projeto->delete();
        return response()->json(null, 204);
    }
}
