<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all($select = NUll) //index
    {
        if($select != NULl)
        {
            return User::all($select);
        }
        else
        {
            return User::all();
        }
    }

    public function create($input) //store
    {
        return User::create($input);
    }

    public function find($id) //edit or  show
    {
        return User::findorfail($id);
    }

    public function update($input,$id) //update
    {
        //$input = $request->all();
        $data = $input->all();
        $user = User::find($id);
        // $user->fill($input)->save();
        $user->fill($data)->save();
    }

    public function delete($id) //edit
    {
        return user::findorfail($id)->delete();
    }
}
