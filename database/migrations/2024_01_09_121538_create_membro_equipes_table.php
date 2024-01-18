<?php

// Em database/migrations/xxxx_xx_xx_create_membro_equipes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembroEquipesTable extends Migration
{
    public function up()
    {
        Schema::create('membro_equipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Usuario')->constrained('users');
            $table->string('Cargo', 100);
            $table->text('Habilidades');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membro_equipes');
    }
}
