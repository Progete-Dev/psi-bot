<?php
namespace App\Repositories;

interface RepositoryInterface{

    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id,array $data);
    public function destroy($id);
}