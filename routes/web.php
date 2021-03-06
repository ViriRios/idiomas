<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/inicio', function() {
    return view('inicio');
});

Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('curso/{curso}/agrega-estudiante', [CursoController::class, 'agregaEstudiante'])->name ('curso.agrega-estudiante'); 

Route::resource('curso', CursoController::class)->middleware('verified');

Route::get('asistencia/entrada' , [AsistenciaController::class, 'formEntrada'])->name('asistencia.formEntrada');
Route::post('asistencia/entrada', [AsistenciaController::class, 'registrarEntrada'])->name('asistencia.registrarEntrada');
Route::get('asistencia/salida' , [AsistenciaController::class, 'formSalida'])->name('asistencia.formSalida');
Route::post('asistencia/salida/{asistencia}', [AsistenciaController::class, 'registrarSalida'])->name('asistencia.registrarSalida');

Route::get('archivo/descargar/{archivo}', [ArchivoController::class, 'descargar'])->name('archivo.descargar');
Route::resource('archivo', ArchivoController::class)->except(['edit', 'update', 'show']);