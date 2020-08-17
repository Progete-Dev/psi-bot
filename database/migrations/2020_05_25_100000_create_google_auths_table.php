<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleAuthsTable extends Migration
{
    public function up()
    {
        Schema::create('google_auths', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('psicologo_id')
                ->references('id')
                ->on('psicologos')
                ->onDelete('cascade');
            $table->string('refresh_token');
            $table->string('access_token');
            $table->timestamp('expires_at');
            $table->text('scope');
            $table->text('check_calendars')->nullable();
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('google_auths');
    }
}
