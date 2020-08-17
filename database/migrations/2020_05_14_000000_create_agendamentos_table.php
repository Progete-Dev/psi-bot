<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{

    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->foreignId('horario_id')
                ->references('id')
                ->on('horario_psicologos');
            $table->datetime('data_agendada');
            $table->integer('status');
            $table->string('recorrencia');
            $table->timestamps();
        });


    }


    public function down()
    {
        Schema::dropIfExists('horario_psicologos');
    }
}
