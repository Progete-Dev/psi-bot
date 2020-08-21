<?php
namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;
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
}