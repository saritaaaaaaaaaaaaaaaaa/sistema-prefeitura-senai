<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CnhController;
use App\Http\Controllers\BairroController;

Route::resource('funcionarios', FuncionarioController::class);
Route::resource('cnhs', CnhController::class);



Route::resource('secretarias', SecretariaController::class);
Route::resource('projetos', ProjetoController::class);

Route::resource('bairros', BairroController::class);