<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\UserValidation;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(UserRepositoryInterface $user)
    {
        $this->middleware('auth');
        $this->userRepo = $user;
    }

    public function index()
    {
        return view('users.index',['users'=>$this->userRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with('success','data inserted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidation $request)
    {
        $input = $request->validated();
        $this->userRepo->create($input);
        return redirect()->route('users.index')->with('stored-msg', ' Data is successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show',['tshow'=>$this->userRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit',['user'=>$this->userRepo->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => '',
            'email' => '',

        ]);
        $inputuser = $request->all();
        $this->userRepo->update($request,$id);
        return redirect()->route('users.index')->with('update-msg', ' Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        user::findOrFail($user->id)->delete();
        return redirect()->route('users.index')->with('delete-msg', ' Data is successfully deleted');
    }

    

}
