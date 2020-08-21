<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone',21);
            $table->string('password');
            $table->boolean('whatsapp')->default(true);
            $table->string('motivo');
            $table->timestamps();
        });


    }


    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
