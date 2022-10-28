<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CursoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SuscripcionController;
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

/*Route::get('/', function () {
    return view('usuario.login');
});*/

//Route::get('/curso/crear',[CursoController::class,'create']);
//Route::get('/curso/administrar',[CursoController::class,'index']);
Route::get('/',[LoginController::class,'index'])->name('login.index');

Route::resource('login', LoginController::class);
Route::resource('curso', CursoController::class);
Route::resource('registro', RegistroController::class);
Route::resource('suscripcion', SuscripcionController::class);

//Route::post('/login',[LoginController::class,'store'])->name('login.store');

//Route::post('registro',[RegistroController::class,'store']);//->name('login.store');