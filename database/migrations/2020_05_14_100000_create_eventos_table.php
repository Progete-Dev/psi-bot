<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreignId('horario_id')
                ->references('id')
                ->on('horario_psicologos');

            $table->json('recorrencia');

            $table->string('google_calendar_id')->default(null);
            $table->datetime('inicio');
            $table->datetime('final');
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
        Schema::dropIfExists('eventos');
    }
}
