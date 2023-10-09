<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\Tareacreada;
use App\Mail\Tareacompletada;

class TareasController extends Controller
{
    public function store(Request $request,){
        if(Auth::check()){
            $request -> validate([
                'title' => 'required|min:3',
                'Description' => 'required|min:10',
                'CaductDate' => 'required'
            ]);

            $tareas = new tareas;
            $tareas -> user_id = $request -> user_id;
            $tareas -> title = $request -> title;
            $tareas -> Description = $request -> Description;
            $tareas -> CaductDate = $request -> CaductDate;
            $tareas -> save();

            $email = auth()->user()->email;

            Mail::to($email)->send(new Tareacreada);
            return redirect()-> route('tareas')->with('success', 'Tarea guardada correctamente');
        }

        return redirect()->to('/login');
            
    }

    public function index(){
        if(Auth::check()){
            $usuario = Auth::user();
            $tareas = tareas::where('user_id', $usuario->id)->orderBy('CaductDate', 'asc')->paginate(7);
            return view('mis_tareas', ['tareas' => $tareas]);
        }
        return redirect()->to('/login');
        
    }

    public function show($id){
        $tarea = tareas::find($id);
        return view('show', ['tarea' => $tarea]);
    }

    public function update(Request $request, $id){
        $tarea = tareas::find($id);
        $tarea -> title = $request -> title;
        $tarea -> Description = $request -> Description;
        $tarea -> save();
        return redirect()-> route('tareas')->with('success', 'Tarea actualizada');
    }

    public function delete($id){
        $tarea = tareas::find($id);
        $tarea->delete();

        return redirect()-> route('tareas')->with('success', 'Tarea eliminada');
    }

    public function cambiarEstado($id)
{
    $tarea = tareas::find($id);

    $tarea->Complete = !$tarea->Complete;
    $tarea->save();
    $email = auth()->user()->email;
    Mail::to($email)->send(new Tareacompletada);

    return redirect()->back();
}
}