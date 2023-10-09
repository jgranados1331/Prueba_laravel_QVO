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
    /*Creacion de tareas */
    public function store(Request $request,){
        /*Validacion de parametros*/
        if(Auth::check()){
            $request -> validate([
                'title' => 'required|min:3',
                'Description' => 'required|min:10',
                'CaductDate' => 'required'
            ]);
            /*Valorizacion de variables para la base de datos */
            $tareas = new tareas;
            $tareas -> user_id = $request -> user_id;
            $tareas -> title = $request -> title;
            $tareas -> Description = $request -> Description;
            $tareas -> CaductDate = $request -> CaductDate;
            $tareas -> save();

            /*Obtencion del email del usuario para realizar el envio del email correspondiente*/
            $email = auth()->user()->email;
            /*Envio de Email */
            Mail::to($email)->send(new Tareacreada);
            return redirect()-> route('tareas')->with('success', 'Tarea guardada correctamente');
        }

        return redirect()->to('/login');
            
    }

    public function index(){
        /*Busqueda de tareas segun usuario, ordernadas de forma ascendente con fecha de vencimiento y paginado macimo a 7 elementos */
        if(Auth::check()){
            $usuario = Auth::user();
            $tareas = tareas::where('user_id', $usuario->id)->orderBy('CaductDate', 'asc')->paginate(7);
            return view('mis_tareas', ['tareas' => $tareas]);
        }
        return redirect()->to('/login');
        
    }

    public function show($id){
        /*Mostrar una tarea especifica segun el id */
        $tarea = tareas::find($id);
        return view('show', ['tarea' => $tarea]);
    }

    public function update(Request $request, $id){
        /*Actualizacion de tarea segun id */
        $tarea = tareas::find($id);
        $tarea -> title = $request -> title;
        $tarea -> Description = $request -> Description;
        $tarea -> save();
        return redirect()-> route('tareas')->with('success', 'Tarea actualizada');
    }

    public function delete($id){
        /*Eliminar tarea segun id */
        $tarea = tareas::find($id);
        $tarea->delete();

        return redirect()-> route('tareas')->with('success', 'Tarea eliminada');
    }

    public function cambiarEstado($id)
{
    /*Cambio de estado completado de la tarea*/
    $tarea = tareas::find($id);

    $tarea->Complete = !$tarea->Complete;
    $tarea->save();
    $email = auth()->user()->email;
    Mail::to($email)->send(new Tareacompletada);

    return redirect()->back();
}
}