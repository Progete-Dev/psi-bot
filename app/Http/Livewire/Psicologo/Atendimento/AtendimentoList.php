<?php

namespace App\Http\Livewire\Psicologo\Atendimento;

use App\Models\Atendimento\Evento;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AtendimentoList extends Component
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
        $atendimentos = Evento::paraPsicologo(Auth::user()->id)
            ->with('cliente')
            ->orderBy('updated_at',$this->sortOrder)
            ->paginate(10);
        return view('livewire.psicologo.atendimento.index',[
            'atendimentos' => $atendimentos
        ]);
    }
}
