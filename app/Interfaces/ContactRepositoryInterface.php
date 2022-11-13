<?php

namespace App\Interfaces;
use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function all(); //index
    public function create($input); //store
    public function find($id); //show ,edit
    public function update($request,$id); //update
    public function delete($id); //destroy

}
