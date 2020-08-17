<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreCadastrosTable extends Migration
{
    public function up()
    {
        Schema::create('pre_cadastros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->unique();            
            $table->string('crp',15)->unique();
            $table->string('telefone')->unique();
            $table->boolean('whatsapp')->default(false);
            $table->string('cep', 8);
            $table->string('cidade');
            $table->string('estado');
        });
    }


    public function down()
    {
        Schema::dropIfExists('pre_cadastros');
    }
}
