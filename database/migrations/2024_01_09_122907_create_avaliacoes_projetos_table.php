<?php
// Em database/migrations/xxxx_xx_xx_create_avaliacoes_projetos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesProjetosTable extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes_projetos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Projeto')->constrained('projetos');
            $table->integer('Avaliacao_Geral');
            $table->text('Comentarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes_projetos');
    }
}
