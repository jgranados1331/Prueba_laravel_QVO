<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Configuracion de nuestras rutas*/

/*Configuracion ruta principal*/
Route::get('/', function () {
    return view('/login');
});


/*Configuracion ruta mis tareas*/
Route::get('/mis-tareas', function(){
    
    return redirect('/login');
});


/*Configuracion ruta mis tareas - acciones*/
/*Ruta de creacion de tareas*/
Route::post('/mis-tareas', [TareasController::class, 'store'])->name('tareas');
/*Ruta de visualizacion de tareas*/
Route::get('/mis-tareas', [TareasController::class, 'index'])->name('tareas');
/*Ruta de visualizacion de tarea individual*/
Route::get('/mis-tareas/{id}', [TareasController::class, 'show'])->name('tareas-edit');
/*Ruta de cambio de estado de tarea*/
Route::post('/mis-tareas/{id}', [TareasController::class, 'cambiarEstado'])->name('tareas-estado');
/*Ruta de edicion de tarea*/
Route::patch('/mis-tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');
/*Ruta de elimincacion de tarea*/
Route::delete('/mis-tareas/{id}', [TareasController::class, 'delete'])->name('tareas-destroy');
/*Ruta de registro de usuario*/
Route::get('/register', function(){
    return view('register');
});

/*Ruta de accion registro de usuario*/
Route::post('/register',[RegisterController::class, 'register']);
/*Ruta de inicio de sesion  de usuario*/
Route::get('/login',[LoginController::class, 'show']);
/*Ruta de accion inicio de sesion de usuario*/
Route::post('/login',[LoginController::class, 'login']);
/*Ruta de cerrar sesion de usuario*/
Route::get('/logout',[LogoutController::class, 'logout']);