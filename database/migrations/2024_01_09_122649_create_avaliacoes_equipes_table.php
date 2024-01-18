<?php
// Em database/migrations/xxxx_xx_xx_create_avaliacoes_equipes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesEquipesTable extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes_equipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Equipe')->constrained('equipes');
            $table->integer('Avaliacao_Geral');
            $table->text('Comentarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes_equipes');
    }
}
