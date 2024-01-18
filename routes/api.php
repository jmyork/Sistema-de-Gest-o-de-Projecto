<?php
use Illuminate\Http\Request;
use App\Http\Controllers\API\EquipeController;
use App\Http\Controllers\API\MembroEquipeController;
use App\Http\Controllers\API\TarefaController;
use App\Http\Controllers\API\AvaliacaoTarefaController;
use App\Http\Controllers\API\AvaliacaoEquipeController;
use App\Http\Controllers\API\AvaliacaoProjetoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Em routes/api.php

// Em routes/api.php
// Em routes/api.php
// Em routes/api.php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjetoController;
use App\Http\Controllers\API\UserController; // Certifique-se de importar o controlador apropriado


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'create']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('avaliacoes-projetos', AvaliacaoProjetoController::class);
    Route::apiResource('avaliacoes-equipes', AvaliacaoEquipeController::class);
    Route::apiResource('avaliacoes-tarefas', AvaliacaoTarefaController::class);
    Route::apiResource('equipes', EquipeController::class);
    Route::apiResource('membro-equipes', MembroEquipeController::class);
    Route::apiResource('tarefas', TarefaController::class);
    Route::apiResource('projetos', ProjetoController::class);
    // routes/api.php
    Route::get('/users/{id}', [UserController::class, 'getUserById'])->name('users.get_by_id');
    Route::get('/usersProject/{id}', [UserController::class, 'getProjetosByUserId'])->name('users.project.get_by.user.id');
    Route::get('/users/{email}', [UserController::class, 'getUserByEmail'])->name('users.get_by_email');
    Route::get('/getMyProjects/', [UserController::class, 'getProjetosDoUsuarioAutenticado'])->name('get_autenticated_users');
});
