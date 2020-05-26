<?php

namespace App\Models;

use App\RespostaFormulario;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','ehpsicologo'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function atendimentos(){
        if($this->ehpsicologo == true)
            return $this->hasMany(Atendimento::class,'psicologo_id','id');
        else
            return $this->hasMany(Atendimento::class,'cliente_id','id');
    }

    public function notificacoes(){
        if($this->ehpsicologo == true)
            return $this->hasMany(NotificacaoPsicologo::class,'psicologo','id');
        else
            return $this->hasMany(NotificacaoDeAtendimento::class,'cliente_id','id');   
    }

    public function ultimoAtendimento(){
        
        return $this->atendimentos()->orderBy('updated_at','DESC')->first();
        
    }
}
