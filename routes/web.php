<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('beneficiario')->group(function () {
    Route::get('/index', [App\Http\Controllers\BeneficiarioController::class, 'index'])->name('beneficiario.index');
    Route::get('/cadastro', [App\Http\Controllers\BeneficiarioController::class, 'cadastro'])->name('beneficiario.cadastro');
});

Route::prefix('medico')->group(function () {
    Route::get('/index', [App\Http\Controllers\MedicoController::class, 'index'])->name('medico.index');
    Route::get('/cadastro', [App\Http\Controllers\MedicoController::class, 'cadastro'])->name('medico.cadastro');
});

Route::prefix('especialidade')->group(function () {
    Route::get('/index', [App\Http\Controllers\EspecialidadeController::class, 'index'])->name('especialidade.index');
    Route::get('/cadastro', [App\Http\Controllers\EspecialidadeController::class, 'cadastro'])->name('especialidade.cadastro');
});

Route::prefix('local')->group(function () {
    Route::get('/index', [App\Http\Controllers\LocalController::class, 'index'])->name('local.index');
    Route::get('/cadastro', [App\Http\Controllers\LocalController::class, 'cadastro'])->name('local.cadastro');
});

Route::prefix('atendimento')->group(function () {
    Route::get('/index', [App\Http\Controllers\AtendimentoController::class, 'index'])->name('atendimento.index');
    Route::get('/cadastro', [App\Http\Controllers\AtendimentoController::class, 'cadastro'])->name('atendimento.cadastro');
});

Route::prefix('relatorio')->group(function () {
    Route::get('/index', [App\Http\Controllers\RelatorioController::class, 'index'])->name('relatorio.index');
});