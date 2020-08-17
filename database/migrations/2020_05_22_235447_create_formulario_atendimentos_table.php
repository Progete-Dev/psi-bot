<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioAtendimentosTable extends Migration
{

    public function up()
    {
        Schema::create('formulario_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formulario_atendimentos');
    }
}
