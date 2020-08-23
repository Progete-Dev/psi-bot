<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthLogin extends Component
{
    public $email;
    public $password;

    public function login(){
        $credentials = $this->validate([
            'email' => 'required|email|exists:psicologos,email',
            'password' => 'required'
        ],[
            'email.required' => 'O Email é Obrigatório',
            'email.email'    => 'O email não é válido',
            'email.exists' => 'Email fornecido é inválido',
            'password.required' => 'A Senha é obrigatória'
        ]);

        if(!Auth::attempt($credentials)){
            $this->addError('error','Usuário inválido');
            return;
        }
        if(Auth::user()->horarios->count() == 0){
            session()->flash('warning','Você não possui horários cadastrados, adicione horários para atendimento');
            return redirect()->route('psicologo.horarios');
        }
        return redirect()->route('psicologo.agenda');
    }

    public function perfil(){
        return view('psicologo.perfil');
    }
    public function render()
    {
        return view('livewire.auth-login');
    }
}
