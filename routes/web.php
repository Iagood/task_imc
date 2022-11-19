<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController;

Route::get('cadastro/participantes', [ParticipanteController::class,'novo'])->name('novo');
Route::post('cadastro/participantes', [ParticipanteController::class,'gravar']);
Route::get('painel/inscritos', [ParticipanteController::class,'listagem']);

