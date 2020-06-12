<?php

namespace App\Models;

use App\RespostaFormulario;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','ehpsicologo','horarios'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = ['horarios'=>'array'];

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

    public function getFormulariosAttribute(){
        return Formulario::all();
    }

    public function getAtendimentosSemanaAttribute(){
        $horarios = [
            'domingo',
            'segunda',
            'terca',
            'quarta',
            'quinta',
            'sexta',
            'sabado',
        ];
        if($this->ehpsicologo == true){
            return $this->atendimentos()
            ->where('status',Atendimento::CONFIRMADO)
            ->where('data_atendimento','>=', Carbon::today())
            ->where('data_atendimento','<=',Carbon::today()->addDays(6))
            ->get()->groupBy(function($atendimento) use ($horarios){
                return $horarios[$atendimento->data_atendimento->dayOfWeek];
            })->map(function($atendimentos){
                return $atendimentos->groupBy(function($atendimento){
                    return $atendimento->data_atendimento->hour;
                });
            });
        }
    }

    public function getHorariosDisponiveisAttribute(){
        if($this->ehpsicologo == true){
            $atendimentos = $this->atendimentosSemana;
            return collect($this->horarios)->map(function($horarios,$dia) use($atendimentos){
                if($atendimentos->has($dia)){
                    return collect($horarios)->filter(function($horario) use ($atendimentos,$dia){
                        return !($atendimentos[$dia]->has($horario['de']) or $atendimentos[$dia]->has($horario['ate']));
                    })->toArray();
                }
                return $horarios;
            });
        }
    }
}
