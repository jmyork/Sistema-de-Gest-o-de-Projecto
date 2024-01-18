<?php

// Em database/migrations/xxxx_xx_xx_create_projetos_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Usuario_Criador')->constrained('users');
            $table->string('Nome');
            $table->text('Descricao');
            $table->date('Data_Inicio');
            $table->date('Data_Conclusao_Prevista');
            $table->decimal('Orcamento', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
