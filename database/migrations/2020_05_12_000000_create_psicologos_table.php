<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsicologosTable extends Migration
{

    public function up()
    {
        Schema::create('psicologos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('crp',15)->unique();
            $table->string('especialidade');
            $table->string('telefone',21);
            $table->boolean('whatsapp')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamp('ultima_notificacao')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        
    }


    public function down()
    {
        Schema::dropIfExists('psicologos');
    }
}
