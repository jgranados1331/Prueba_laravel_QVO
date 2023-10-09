<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/mis-tareas');
        }

        return view('login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->witherrors('auth.failed');
        }
        $user = Auth:: getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

    }

    public function authenticated(Request $request, $user){
        return redirect('/mis-tareas');
    }
    
}
