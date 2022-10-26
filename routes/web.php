<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendasController;

Route::get('/imc/{nome}/{peso}/{altura}/{genero}', [PacienteController::class, 'calcularIMC']);
/*Route::get('/{tipo?}', [ProdutoController::class, 'listarProdutos']);*/


Route::prefix('vendas')->group(function () {
    Route::get('/', [VendasController::class,'listarVendas']);
    Route::get('/ver/{id}', [VendasController::class,'verVenda']);
    Route::get('/nova/{produto}/{preco}/{quantidade}', [VendasController::class, 'cadastrarVenda']);
    Route::get('/atualizar/{id}/{produto}/{preco}/{quantidade}', [VendasController::class,'atualizarVenda']);
    Route::get('/excluir/{id}', [VendasController::class,'excluirVenda']);
});
