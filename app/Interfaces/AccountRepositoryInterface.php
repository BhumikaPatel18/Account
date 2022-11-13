<?php

namespace App\Interfaces;

interface AccountRepositoryInterface
{
    public function all($select = NULL); //index
    public function create($input); //store
    public function find($id); //show ,edit
    public function update($id,$input); //update
    public function delete($id); //destroy

}
