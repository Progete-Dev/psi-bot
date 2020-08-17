<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoAtendimentosTable extends Migration
{

    public function up()
    {
        Schema::create('notificacao_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notificacao_id')
                ->references('id')
                ->on('notificacoes')
                ->onDelete('cascade');
            $table->foreignId('atendimento_id')
                ->references('id')
                ->on('atendimentos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notificacao_atendimentos');
    }
}
