<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CampoFormulario extends Model
{
    const TEXT      = 1;
    const CHECKBOX  = 2;
    const RADIO     = 3;
    const SELECT    = 4;
    const TEXTAREA  = 5;

    protected $fillable =[
        'nome',
        'tipo',
        'opcoes',
        'obrigatorio'
    ];


    public function renderInput($class,$opcao = null){
        switch($this->tipo){
            case 1:
                return '<input type="text" name="'.$this->nome.'" value="'.$opcao.'"'. ($this->obrigatorio ? 'required' : '').' class="'.$class.'">';
            break;
            case 2:
                return '<input type="checkbox" name="'.$this->nome.'" value="'.$opcao.'"'. ($this->obrigatorio ? 'required' : '').' class="'.$class.'">';
            break;
            case 3:
                return '<input type="radio" name="'.$this->nome.'" value="'.$opcao.'"'. ($this->obrigatorio ? 'required' : '').' class="'.$class.'">';
            break;
            case 4:
                $select = '<select name="'.$this->nome.'"'. ($this->obrigatorio ? 'required' : '').' class="'.$class.'">';
                $options = '';
                
                foreach(json_decode($this->opcoes) as $campo){
                    
                    $options .= '<option value="'.$campo->valor.'">'.$campo->nome.'></option>';
                }
                return $select.$options.'</select>';
            break;
            case 5:
                return '<textarea type="radio" name="'.$this->nome.'" value="'.$opcao.'"'. ($this->obrigatorio ? 'required' : '').' class="'.$class.'"></textarea>';
            break;

        }
    }
    
    public function formulario(){
        return $this->belongsTo(Formulario::class,'formulario_id','id');
    }

    public function resposta($userId){
        return RespostaFormulario::where([['cliente_id','=',$userId],['campo_id','=',$this->id],['formulario_id','=',$this->formulario->id]])->get();
    }
}
