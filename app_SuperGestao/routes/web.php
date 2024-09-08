<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PosContatoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;

// Regular GET Routes
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');
Route::get('/pos-contato', [PosContatoController::class, 'posContato'])->name('site.pos-contato');

// Regular POST Routes
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

// App Routes
Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/cliente', [ClientesController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedoresController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/atualizar/{id}', [FornecedoresController::class, 'atualizar'])->name('app.fornecedor.atualizar');
    Route::get('/fornecedor/excluir/{id}', [FornecedoresController::class, 'excluir'])->name('app.fornecedor.excluir');
    Route::get('/produto', [ProdutosController::class, 'index'])->name('app.produto');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
});