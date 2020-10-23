<?php
namespace App\Repositories;
use App\Models\Atendimento\Agendamento;
use Illuminate\Database\Eloquent\Builder;

class AgendamentoRepository extends BaseRepository
{
    public function  __construct(Agendamento  $model){
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id,array $data){
        $old = $this->find($id);
        return $old->update($data);
    }
    public function destroy($id){
        $object = $this->find($id);
        return $object->delete();
    }

    public function calculaConflito($data){
        /** @var Builder $query */
        $query = $this->model->newQuery();
        $query->where()
    }
}