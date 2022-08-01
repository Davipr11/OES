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
use App\Http\Controllers\AutorizacionController;
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

Route::get('/Premio_nacional_OES/evaluador',[OperadorController::class, 'index']);
Route::get('/Premio_nacional_OES/evaluador2',[Operador2Controller::class, 'index']);

Route::resource('Premio_Nacional_OES/Evaluadores/consulta', ConsultarUsuariosController::class);

Route::get('/Premio_nacional_OES/Evaluadores', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/Premio_Nacional_OES/inscripcion',[UsersInscriptionController::class, 'index']);
Route::post('Premio_Nacional_OES/inscripcion',[UsersInscriptionController::class, 'inscribir'])->name('inscripcion');
Route::post('Premio_Nacional_OES/inscripcion/{id}/update',[UsersInscriptionController::class, 'update']);

Route::get('/Premio_Nacional_OES/Evaluadores/consultaInscripcion',[InscritosController::class, 'index']);
Route::get('/Premio_Nacional_OES/Evaluadores/consultaInscripcion',[InscritosController::class, 'Inscritos']);

Route::post('/Premio_Nacional_OES/Evaluadores/consultaInscripcion/filtro',[InscritosController::class, 'InscritosFiltro']);


Route::get('/index',[DepartamentoController::class, 'index']);
Route::get('/exportar',[ExportarController::class, 'exportar']);

Route::get('/Premio_nacional_OES/Preguntas_Frecuentes',[PreguntaController::class, 'index']);
Route::post('/Premio_nacional_OES/Preguntas_Frecuentes',[PreguntaController::class, 'preguntar']);

Route::get('/Premio_nacional_OES/Evaluadores/respuesta',[RespuestaController::class, 'index'])->name('respuesta');
Route::post('/Premio_nacional_OES/Evaluadores/respuesta',[RespuestaController::class, 'Responder']);
Route::get('/Premio_nacional_OES/Evaluadores/respuesta/{id}/eliminar',[RespuestaController::class, 'eliminar']);
Route::get('/Premio_nacional_OES/Evaluadores/respuesta/{id}/editar',[RespuestaController::class, 'editar']);
Route::post('/Premio_nacional_OES/Evaluadores/respuesta/{id}/update',[RespuestaController::class, 'update']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/evaluaciones',[EvaluarController::class, 'index']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/autorizacion',[AutorizacionController::class, 'index']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/autorizacionE',[AutorizacionController::class, 'autorizar']);

Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/autorizacionEdit',[AutorizacionController::class, 'autorizarEdit']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/{reco}/evaluarPerinatal',[EvaluarController::class, 'evaluarPerinatal']);
Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/{reco}/evaluarCardiovascular',[EvaluarController::class, 'evaluarCardiovascular']);
Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/{reco}/evaluarCancer',[EvaluarController::class, 'evaluarCancer']);
Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/{reco}/evaluarEnfoque',[EvaluarController::class, 'evaluarEnfoque']);


Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/evaluacion',[EvaluarController::class, 'saveEvaluar']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/evaluacioncardio',[EvaluarController::class, 'saveEvaluarcardio']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/evaluacioncancer',[EvaluarController::class, 'saveEvaluarcancer']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/evaluacionenfoque',[EvaluarController::class, 'saveEvaluarenfoque']);

Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/salvarevaluacionperinatal',[EvaluarController::class, 'salvarEvaluarPerinatal']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/salvarevaluacioncardio',[EvaluarController::class, 'salvarEvaluarcardio']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/salvarevaluacioncancer',[EvaluarController::class, 'salvarEvaluarcancer']);
Route::post('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/salvarevaluacionenfoque',[EvaluarController::class, 'salvarEvaluarenfoque']);

Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{Codigorandom}/resultado',[EvaluarController::class, 'resultado']);
Route::get('/Premio_nacional_OES/Evaluadores/consultaInscripcion/{id}/resultadofinal',[EvaluarController::class, 'final']);
Route::get('/Premio_nacional_OES/Evaluadores/evaluados',[EvaluarController::class, 'evaluados']);
