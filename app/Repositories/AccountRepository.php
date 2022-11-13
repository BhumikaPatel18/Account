<?php

namespace App\Repositories;

use App\Interfaces\AccountRepositoryInterface;
use App\Models\Account;

class AccountRepository implements AccountRepositoryInterface
{
    public function all($select = NUll) //index
    {
        if($select != NULl)
        {
            return Account::all($select);
        }
        else
        {
            return Account::all();
        }
    }

    public function create($input) //store
    {
        // $input = $request->validated();
        return Account::create($input);
        return Account;
    }

    public function find($id) //edit or  show
    {
        return Account::findorfail($id);
    }

    public function update($id,$input) //update
    {
        $account = Account::find($id);
        $account->fill($input)->save();
        return $account;
    }

    public function delete($id) //edit
    {
        return Account::findorfail($id)->delete();
    }

}
