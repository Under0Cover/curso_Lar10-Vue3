<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\PosContatoController;

// Regular GET Routes
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', [LoginController::class, 'login'])->name('site.login');
Route::get('/pos-contato', [PosContatoController::class, 'posContato'])->name('site.pos-contato');

// Regular POST Routes
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

// App Routes
Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/clientes', [ClientesController::class, 'clientes'])->name('app.clientes');
    Route::get('/fornecedores', [FornecedoresController::class, 'fornecedores'])->name('app.fornecedores');
    Route::get('/produtos', [ProdutosController::class, 'produtos'])->name('app.produtos');
});