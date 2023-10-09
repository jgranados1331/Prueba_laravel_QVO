<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        /*validacion de autenticacion de usuario para controlar las vistas */
        if(Auth::check()){
            /*si el usuario esta autenticado redireje a la vista de tareas*/
            return redirect('/mis-tareas');
        }
        /* si no lo redirije al login */
        return view('login');
    }

    public function login(LoginRequest $request){
        /*Validacion de request de Login */
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->witherrors('auth.failed');
        }
        /*obtencion de credenciales del usuario*/
        $user = Auth:: getProvider()->retrieveByCredentials($credentials);
        /* Creacion de sesion login del usuario */
        Auth::login($user);

        return $this->authenticated($request, $user);

    }

    public function authenticated(Request $request, $user){
        return redirect('/mis-tareas');
    }
    
}
