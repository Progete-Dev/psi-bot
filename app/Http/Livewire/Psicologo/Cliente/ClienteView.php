<?php

namespace App\Http\Livewire\Psicologo\Cliente;

use App\Models\Cliente\Cliente;
use Livewire\Component;

class ClienteView extends Component
{
    public $clientId;

    public function mount($clienteId){
        $this->clientId = $clienteId;
    }
    public function render()
    {
        $usuario = Cliente::find($this->clientId);
        return view('livewire.psicologo.cliente.view',[
            'usuario' => $usuario
        ]);
    }
}
