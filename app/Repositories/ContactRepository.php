<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function all() //index
    {
        // return Contact::all();
        return Contact::paginate(4);
    }

    public function create($input) //store
    {
        // $input = $request->validated();
        return Contact::create($input);
        // return account::all();
    }

    public function find($id) //edit or  show
    {
        return Contact::findorfail($id);
    }

    public function update($request,$id) //update
    {
        $input = $request->all();
        $contact = Contact::find($id);
        $contact->fill($input)->save();
    }

    public function delete($id) //edit
    {
        return contact::findorfail($id)->delete();
    }
}
