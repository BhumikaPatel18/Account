<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\AccountValidation;
use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

class AccountController extends Controller
{
    protected $accountRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    public function __construct(AccountRepositoryInterface $account)
    {
        // $this->middleware('auth');
        $this->accountRepo = $account;
    }


     public function index()
    {
        // $account = account::all();
        // return view('accounts.index') -> with('account', $account);
        return view('accounts.index',['accounts'=>$this->accountRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create')->with('success','data inserted successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountValidation $request)
    {
        // $input = $request->validated();
        //  account::create($input);
        //  return redirect()->route('accounts.index')->with('stored-msg', ' Data is successfully inserted');
        $input = $request->validated();
        $this->accountRepo->create($input);
        return redirect()->route('accounts.index')->with('stored-msg', ' Data is successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //show(account $account)
    {
        // $tshow=account::find($account->id);
        // return view('accounts.show', compact('tshow'));
        return view('accounts.show',['tshow'=>$this->accountRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $account = account::findOrFail($id);
        // return view('accounts.edit', compact('account'));
        return view('accounts.edit',['account'=>$this->accountRepo->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        // $validatedData = $request->validate([
        //     'user_name' => '',
        //     'first_name' => '',
        //     'last_name' => '',
        //     'dob' => '',
        //     'phone' => '',
        //     'email' => '',
        //     'address' => '',
        //     'country' => '',
        //     'state' => '',
        //     'gender' => '',
        //     'hobby' => '',
        // ]);
        // account::whereId($id)->update($validatedData);
        // return redirect('/accounts')->with('success', ' Data is successfully updated');

         $input = $request->all();
        $this->accountRepo->update($id,$input);
        return redirect()->route('accounts.index')->with('update-msg', ' Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        account::findOrFail($account->id)->delete();

        return redirect()->route('accounts.index')->with('delete-msg', ' Data is successfully deleted');
    }

    public function testRoute()
    {
        $print = "testRoute";
        //return $print;
        //dd($print);
        return redirect()->route('accounts.index')->with('delete-msg', ' running');

    }

}
