<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;

class AuthController extends Controller
{

    public function redirect()
    {
     return Socialite::driver('google')->redirect();
    }
    public function Callback(){
        try{
        $userSocial =  Socialite::driver('google')->stateless()->user();
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();

        if($users){
            Auth::login($users);
            return redirect('/home');
        }
        else{
                $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'password'      => encrypt('my-google'),
                'provider_id'   => $userSocial->getId(),
                'provider'      => 'google',
            ]);
            Auth::login($user);
         return redirect()->route('/home');
        }
    }
    catch(Exception $e){
        dd($e->getMessage());
        // dd('hello');
    }
    }

}
