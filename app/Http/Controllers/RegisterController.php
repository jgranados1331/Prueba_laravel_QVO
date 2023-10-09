<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registro;


class RegisterController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/mis-tareas');
        }
        return view('registro');
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        $email = $request->email;
        Mail::to($email)->send(new Registro);
        return redirect('/login')->with('success','Cuenta registrada');
    }
}
