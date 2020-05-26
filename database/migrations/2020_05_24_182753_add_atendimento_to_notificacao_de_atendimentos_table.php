<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtendimentoToNotificacaoDeAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificacao_de_atendimentos', function (Blueprint $table) {
            $table->foreignId('atendimento_id')->references('id')->on('atendimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificacao_de_atendimentos', function (Blueprint $table) {
           $table->dropColumn('atendimento_id');
        });
    }
}
