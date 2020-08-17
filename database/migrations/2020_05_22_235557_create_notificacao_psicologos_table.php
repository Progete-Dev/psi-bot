<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacaoPsicologosTable extends Migration
{

    public function up()
    {
        Schema::create('notificacao_psicologos', function (Blueprint $table) {
            $table->foreignId('notificacao_id')
                ->references('id')
                ->on('notificacoes')
                ->onDelete('cascade');
            $table->foreignId('psicologo_id')
                ->references('id')
                ->on('psicologos')
                ->onDelete('cascade');
            $table->boolean('notificado')
                ->default(false);

            $table->timestamps();
            $table->index('psicologo_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notificacao_psicologos');
    }
}
