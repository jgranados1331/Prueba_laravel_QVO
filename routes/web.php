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

Route::get('/', function () {
    return view('menu');
});



Route::get('/mis-tareas', function(){
    
    return redirect('/login');
});

Route::post('/mis-tareas', [TareasController::class, 'store'])->name('tareas');
Route::get('/mis-tareas', [TareasController::class, 'index'])->name('tareas');
Route::get('/mis-tareas/{id}', [TareasController::class, 'show'])->name('tareas-edit');
Route::post('/mis-tareas/{id}', [TareasController::class, 'cambiarEstado'])->name('tareas-estado');
Route::patch('/mis-tareas/{id}', [TareasController::class, 'update'])->name('tareas-update');
Route::delete('/mis-tareas/{id}', [TareasController::class, 'delete'])->name('tareas-destroy');
Route::get('/register', function(){
    return view('register');
});

Route::post('/register',[RegisterController::class, 'register']);
Route::get('/login',[LoginController::class, 'show']);
Route::post('/login',[LoginController::class, 'login']);
Route::get('/logout',[LogoutController::class, 'logout']);