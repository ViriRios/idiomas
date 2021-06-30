<?php

use App\Http\Controllers\CursoController;
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

Route::resource('curso', CursoController::class)->middleware('auth');