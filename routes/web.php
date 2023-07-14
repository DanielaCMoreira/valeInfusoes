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
    Route::post('/cadastro', [App\Http\Controllers\BeneficiarioController::class, 'cadastro'])->name('beneficiario.cadastro');
});

Route::prefix('medico')->group(function () {
    Route::get('/index', [App\Http\Controllers\MedicoController::class, 'index'])->name('medico.index');
    Route::post('/cadastro', [App\Http\Controllers\MedicoController::class, 'cadastro'])->name('medico.cadastro');
});

Route::prefix('especialidade')->group(function () {
    Route::get('/index', [App\Http\Controllers\EspecialidadeController::class, 'index'])->name('especialidade.index');
    Route::post('/cadastro', [App\Http\Controllers\EspecialidadeController::class, 'cadastro'])->name('especialidade.cadastro');
});

Route::prefix('local')->group(function () {
    Route::get('/index', [App\Http\Controllers\LocalController::class, 'index'])->name('local.index');
    Route::post('/cadastro', [App\Http\Controllers\LocalController::class, 'cadastro'])->name('local.cadastro');
});

Route::prefix('atendimento')->group(function () {
    Route::get('/index', [App\Http\Controllers\AtendimentoController::class, 'index'])->name('atendimento.index');
    Route::post('/cadastro', [App\Http\Controllers\AtendimentoController::class, 'cadastro'])->name('atendimento.cadastro');
    Route::post('/carregarCampos', [App\Http\Controllers\AtendimentoController::class, 'carregarCampos'])->name('atendimento.carregar.campos');
});

Route::prefix('relatorio')->group(function () {
    Route::get('/beneficiarios', [App\Http\Controllers\RelatorioController::class, 'beneficiarios'])->name('relatorio.beneficiarios');
    Route::post('/beneficiarios-resultados', [App\Http\Controllers\RelatorioController::class, 'beneficiariosResultados'])->name('relatorio.beneficiarios.resultados');
    Route::get('/medicos', [App\Http\Controllers\RelatorioController::class, 'medicos'])->name('relatorio.medicos');
    Route::post('/medicos-resultados', [App\Http\Controllers\RelatorioController::class, 'medicosResultados'])->name('relatorio.medicos.resultados');
    Route::get('/atendimentos', [App\Http\Controllers\RelatorioController::class, 'atendimentos'])->name('relatorio.atendimentos');
    Route::post('/atendimentos-resultados', [App\Http\Controllers\RelatorioController::class, 'atendimentosResultados'])->name('relatorio.atendimentos.resultados');
    Route::get('/locais-atendimento', [App\Http\Controllers\RelatorioController::class, 'locaisAtendimento'])->name('relatorio.locais.atendimento');
    Route::post('/locais-atendimento-resultados', [App\Http\Controllers\RelatorioController::class, 'locaisAtendimentoResultados'])->name('relatorio.locais.atendimento.resultados');
    Route::get('/beneficiario-maiores-atendimentos', [App\Http\Controllers\RelatorioController::class, 'beneficiariosMaioresAtendimentos'])->name('relatorio.maiores.atendimentos');
});