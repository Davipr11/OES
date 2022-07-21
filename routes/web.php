<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CambioContraseñaController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\Operador2Controller;
use App\Http\Controllers\ConsultarUsuariosController;
use App\Http\Controllers\UsersInscriptionController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ExportarController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\EvaluarController;
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
    return redirect('/Premio_nacional_OES/Evaluadores');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/Premio_nacional_OES/Evaluadores/register',[RegisterController::class, 'index']);
Route::post('/Premio_nacional_OES/Evaluadores/register',[RegisterController::class, 'register']);

Route::get('/login',[LoginController::class, 'index']);
Route::post('/login',[LoginController::class, 'Login'])->name('login');

Route::get('/Premio_nacional_OES/Evaluadores',[HomeController::class, 'index']);
Route::get('/logout',[LogoutController::class, 'logout']);

Route::get('/cambiocontrasena',[CambioContraseñaController::class, 'index'])->name('cambio');
Route::post('/cambiocontrasena',[CambioContraseñaController::class, 'cambiar'])->name('cambiar');

Route::get('/operador',[OperadorController::class, 'index']);
Route::get('/operador2',[Operador2Controller::class, 'index']);

Route::resource('Premio_Nacional_OES/Evaluadores/consulta', ConsultarUsuariosController::class);

Route::get('/Premio_nacional_OES/Evaluadores', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/Premio_Nacional_OES/inscripcion',[UsersInscriptionController::class, 'index']);
Route::post('Premio_Nacional_OES/inscripcion',[UsersInscriptionController::class, 'inscribir'])->name('inscripcion');
Route::post('Premio_Nacional_OES/inscripcion/{id}/update',[UsersInscriptionController::class, 'update']);

Route::get('/Premio_Nacional_OES/Evaluadores/consultaInscripcion',[InscritosController::class, 'index']);
Route::get('/Premio_Nacional_OES/Evaluadores/consultaInscripcion',[InscritosController::class, 'Inscritos']);

Route::get('/index',[DepartamentoController::class, 'index']);
Route::get('/exportar',[ExportarController::class, 'exportar']);

Route::get('/Premio_nacional_OES/Preguntas_Frecuentes',[PreguntaController::class, 'index']);
Route::post('/Premio_nacional_OES/Preguntas_Frecuentes',[PreguntaController::class, 'preguntar']);

Route::get('/Premio_nacional_OES/Evaluadores/respuesta',[RespuestaController::class, 'index'])->name('respuesta');
Route::post('/Premio_nacional_OES/Evaluadores/respuesta',[RespuestaController::class, 'Responder']);
Route::get('/Premio_nacional_OES/Evaluadores/respuesta/{id}/eliminar',[RespuestaController::class, 'eliminar']);
Route::get('/Premio_nacional_OES/Evaluadores/respuesta/{id}/editar',[RespuestaController::class, 'editar']);
Route::post('/Premio_nacional_OES/Evaluadores/respuesta/{id}/update',[RespuestaController::class, 'update']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/evaluar',[EvaluarController::class, 'evaluar']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/evaluacion',[EvaluarController::class, 'saveEvaluar']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/resultado',[EvaluarController::class, 'resultado']);
Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/resultadofinal',[EvaluarController::class, 'final']);
Route::get('/Premio_nacional_OES/Evaluadores/evaluados',[EvaluarController::class, 'evaluados']);
