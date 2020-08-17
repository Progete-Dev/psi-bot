<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacaoAtendimentosTable extends Migration
{
    public function up()
    {
        Schema::create('anotacao_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nota');
            $table->foreignId('atendimento_id')
                ->references('id')
                ->on('atendimentos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anotacao_atendimentos');
    }
}
