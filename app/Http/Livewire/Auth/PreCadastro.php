<?php

namespace App\Http\Livewire\Auth;

use App\Models\Psicologo\PreCadastro as PreCadastroModel;
use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PreCadastro extends Component
{
    public $nome;
    public $crp;
    public $email;
    public $cep;
    public $cidade;
    public $estado;
    public $estados;
    public $telefone;

    public function mount(){
        $this->estados = [
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins'
        ];
    }

    public function render()
    {
        return view('livewire.auth.pre-cadastro');

    }
    public function enviar(){
        $dados = $this->validate([
            'nome'=> "required",
            'crp'=> "required|min:2",
            'telefone'=>"required",
            'email'=>"required|email|unique:pre_cadastros|unique:psicologos,email",
            'cep'=>"required|min:8|max:8",
            'cidade'=>"required",
            'estado'=>"required"
        ],[
            'email.unique' => 'Email Inválido',
            '*.required'=> 'Este campo é obrigatório'
        ]);

        dd(PreCadastroModel::create($dados));
     
        

       
    }

    public function buscarEndereco(){
        try {
            $resposta = Http::get("https://api.postmon.com.br/v1/cep/".$this->cep);
            $data = $resposta->json();       
            $this->cidade = $data['cidade'];
            $this->estado = $data['estado'];
        } catch (Exception $e) {
            session()->flash('error', "falha ao buscar endereço pelo cep!");
        }
        
    }

}
