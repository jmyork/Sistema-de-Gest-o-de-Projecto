<?php
// Em database/migrations/xxxx_xx_xx_create_avaliacoes_tarefas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTarefasTable extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes_tarefas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Tarefa')->constrained('tarefas');
            $table->integer('Avaliacao');
            $table->text('Comentarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes_tarefas');
    }
}
