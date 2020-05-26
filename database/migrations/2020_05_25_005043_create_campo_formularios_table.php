<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampoFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campo_formularios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('tipo');
            $table->boolean('obrigatorio');
            $table->json('opcoes');
            $table->foreignId('formulario_id')->references('id')->on('formulario_atendimentos');
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
        Schema::dropIfExists('campo_formularios');
    }
}
