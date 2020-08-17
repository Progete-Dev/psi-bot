<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->time('inicio_atendimento');
            $table->time('final_atendimento');
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->foreignId('psicologo_id')
                ->references('id')
                ->on('psicologos')
                ->onDelete('cascade');
            $table->foreignId('agendamento_id')
                ->references('id')
                ->on('agendamentos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
