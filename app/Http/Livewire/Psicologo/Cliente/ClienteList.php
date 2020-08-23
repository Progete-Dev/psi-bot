<?php

namespace App\Http\Livewire\Psicologo\Cliente;

use App\Models\Cliente\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteList extends Component
{
    use WithPagination;
    public $search = '';
    public $sortOrder = 'desc';

    protected $updatesQueryString = [
        'searchString' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function paginationView()
    {
        return 'pagination';
    }

    public function resolvePage()
    {
        return $this->page;
    }
    public function previousPage(){
        $this->page = $this->page - 1;
    }
    public function nextPage(){
        $this->page = $this->page + 1;
    }

    public function clearSearch(){
        $this->searchString = '';
    }

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', '%'.$this->search.'%')
            ->orderBy('updated_at',$this->sortOrder)
            ->paginate(10);
        return view('livewire.psicologo.cliente.list',[
            'clientes' => $clientes
        ]);
    }
}
