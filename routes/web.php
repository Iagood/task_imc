<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::get('/imc/{nome}/{peso}/{altura}/{genero}', [PacienteController::class, 'calcularIMC']);
