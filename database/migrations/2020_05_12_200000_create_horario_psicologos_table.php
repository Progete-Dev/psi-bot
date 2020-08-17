<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioPsicologosTable extends Migration
{

    public function up()
    {
        Schema::create('horario_psicologos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('psicologo_id')
                ->references('id')
                ->on('psicologos')
                ->onDelete('cascade');
            $table->integer('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->timestamps();
        });


    }


    public function down()
    {
        Schema::dropIfExists('horario_psicologos');
    }
}
