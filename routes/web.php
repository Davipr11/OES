<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CambioContraseñaController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\Operador2Controller;
use App\http\Controllers\ConsultarUsuariosController;
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
    return redirect('/home');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'register'])->name('register');

Route::get('/login',[LoginController::class, 'index']);
Route::post('/login',[LoginController::class, 'Login'])->name('login');

Route::get('/home',[HomeController::class, 'index']);
Route::get('/logout',[LogoutController::class, 'logout']);

Route::get('/cambiocontrasena',[CambioContraseñaController::class, 'index'])->name('cambio');
Route::post('/cambiocontrasena',[CambioContraseñaController::class, 'cambiar'])->name('cambiar');

Route::get('/operador',[OperadorController::class, 'index']);
Route::get('/operador2',[Operador2Controller::class, 'index']);

Route::resource('consulta', ConsultarUsuariosController::class);



