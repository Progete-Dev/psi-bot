<?php

namespace App\Http\Livewire\Psicologo\Perfil;

use App\Models\Psicologo\Psicologo;
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
        $this->nome = $psicologo->nome;
        $this->email = $psicologo->email;
        $this->crp = $psicologo->crp;
        $this->especialidade = $psicologo->especialidade;
        $this->password = "";
        $this->password_confirm ="";

    }


    public function update(){
        Psicologo::update([
            'id' => $this->idPsicologo,
            'nome' => $this->nome,
            'especialidade' => $this->especialidade
        ]);

    }

    public function render()
    {
        return view('livewire.psicologo.perfil.index');
    }
}
