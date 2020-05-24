<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data_atendimento')->nullable();
            $table->integer('tempo_atendimento')->nullable();
            $table->enum('status',['AGUARDA_PSICOLOGO','AGUARDA_HORARIO','EM_ATENDIMENTO','CONCLUIDO','REMARCADO','CANCELADO']);
            $table->timestamps();
            $table->foreignId('cliente_id')->references('id')->on('users');
            $table->unsignedInteger('psicologo_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
