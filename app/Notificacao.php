<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $table = 'notification';
    protected $fillable = [
        'cliente',
        'mensagem'
    ];
    public function cliente(){
        return User::find($this->cliente);
    }
}
