<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProdutoController;

Route::get('/imc/{nome}/{peso}/{altura}/{genero}', [PacienteController::class, 'calcularIMC']);
Route::get('/{tipo?}', [ProdutoController::class, 'listarProdutos']);
