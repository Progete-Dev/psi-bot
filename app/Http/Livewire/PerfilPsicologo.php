<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PerfilPsicologo extends Component
{
    public $nome;
    public $email;
    public $crp;
    public $especialidade;
    public $password;
    public $password_confirmation;
    public $idPsicologo;

    public function mount(){
        $psicologo = Auth::user();
        $this->idPsicologo = $psicologo->id;
        $this->nome = $psicologo->name;
        $this->email = $psicologo->email;
        $this->crp = $psicologo->crp;
        $this->especialidade = $psicologo->especialidade;
        $this->password = "";
        $this->password_confirm ="";
    }

    public function update(){


    }
    public function render()
    {
        return view('livewire.perfil-psicologo');
    }
}
