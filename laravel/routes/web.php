<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\VeiculosController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/home{id?}', [Homecontroller::class, 'index']);
Route::get('/api', [Homecontroller::class, 'api']);
Route::get('/dados', [Homecontroller::class, 'apidados']);
// home
///////////
//login
Route::get('/', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'login']);
Route::post('/cadastro', [LoginController::class, 'cadastro']);
Route::get('/cadastro', [LoginController::class, 'cadastro']);
//login
///////////
//veiculos
Route::get('/apiVeiculo', [VeiculosController::class, 'veiculoapi']);
Route::get('/veiculos', [VeiculosController::class, 'index']);
Route::get('/veiculos', [VeiculosController::class, 'insert']);
Route::post('/veiculos', [VeiculosController::class, 'insert']);
Route::post('/edit{id?}', [VeiculosController::class, 'edit']);
Route::get('/edit{id?}', [VeiculosController::class, 'edit']);
Route::put('/update{id?}', [VeiculosController::class, 'update'])->name('update');
Route::any('/delete{id?}', [VeiculosController::class, 'delete'])->name('delete');
//veiculos
///////////
//manutencao
Route::get('/info{id?}', [ManutencaoController::class, 'index']);
Route::post('/info{id?}', [ManutencaoController::class, 'insert']);
Route::post('/insertinfo{id?}', [ManutencaoController::class, 'insert']);
Route::get('/insertinfo{id?}', [ManutencaoController::class, 'insert']);
//manutencao