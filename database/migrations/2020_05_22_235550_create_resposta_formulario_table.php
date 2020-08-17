<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostaFormularioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta_formularios', function (Blueprint $table) {
            $table->foreignId('campo_id')
                ->references('id')
                ->on('campo_formularios')
                ->onDelete('cascade');
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->string('resposta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resposta_formulario');
    }
}
