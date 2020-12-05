<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/medicos/list', [MedicoController::class, 'listMedicos']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/pacientes', PacienteController::class);
Route::resource('/medicos', MedicoController::class);
Route::resource('/agendamentos', AgendamentoController::class);
