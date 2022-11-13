<?php

namespace App\Interfaces;
use App\Models\User;

interface UserRepositoryInterface
{
    public function all(); //index
    public function create($input); //store
    public function find($id); //show ,edit
    public function update($id,$input); //update
    public function delete($id); //destroy

}
