<?php

// app/Http/Controllers/API/UserController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Projeto;

class UserController extends Controller
{
    public function getUserByEmail($substring)
    {
        $users = User::where('email', 'like', "%$substring%")->get();
        if ($users->isEmpty()) {
            return response()->json(['error' => 'No users found with the specified email substring'], 404);
        }

        return response()->json($users, 200);
    }
    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }
    public function getProjetosByUserId($id)
    {
        $projetos = Projeto::where(function ($query) use ($id) {
            // Projetos em que o usuário é membro
            $query->whereHas('equipes.membros', function ($subQuery) use ($id) {
                $subQuery->where('id', $id);
            })
                // Projetos criados pelo usuário
                ->orWhere('id_usuario_criador', $id);
        })->get();

        if ($projetos->isEmpty()) {
            return response()->json(['error' => 'No projects found for the specified user'], 404);
        }

        return response()->json($projetos, 200);
    }

    public function getProjetosDoUsuarioAutenticado(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $projetos = Projeto::where(function ($query) use ($user) {
            // Projetos em que o usuário é membro
            $query->whereHas('equipes.membros', function ($subQuery) use ($user) {
                $subQuery->where('id', $user->id);
            })
                // Projetos criados pelo usuário
                ->orWhere('id_usuario_criador', $user->id);
        })->get();

        if ($projetos->isEmpty()) {
            return response()->json(['message' => 'User has no projects'], 404);
        }

        return response()->json($projetos, 200);
    }
}
