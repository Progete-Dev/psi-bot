<?php

namespace App\Services;

interface ServiceInterface{

    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id,array $data);
    public function destroy($id);
}