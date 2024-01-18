<?php
// Em database/migrations/xxxx_xx_xx_create_tarefas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->text('Descricao');
            $table->date('Data_Inicio');
            $table->date('Data_Conclusao_Prevista');
            $table->string('Status', 50);
            $table->foreignId('ID_Equipe')->constrained('equipes');
            $table->foreignId('ID_Membro_Responsavel')->constrained('membro_equipes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
