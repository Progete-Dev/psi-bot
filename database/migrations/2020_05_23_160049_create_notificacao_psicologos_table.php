<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoPsicologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao_psicologos', function (Blueprint $table) {
            $table->foreignId('notificacao')->references('id')->on('notificacao_de_atendimentos');
            $table->foreignId('psicologo')->references('id')->on('users');
            $table->boolean('notificado')->default(false);
            $table->timestamps();
            $table->index('psicologo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacao_atendimento_psicologo');
    }
}
