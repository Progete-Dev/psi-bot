<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokenLinksTable extends Migration
{
    public function up()
    {
        Schema::create('token_links', function (Blueprint $table) {
            $table->id();
            $table->string('token')
                ->unique()
                ->index();
            $table->foreignId('cliente_id')->references('id')->on('clientes');
            $table->dateTime('expires_at');
            $table->boolean('used')->default(false);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('token_links');
    }
}
