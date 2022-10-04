<?php

use Illuminate\Support\Facades\Route;

Route::get('/imc/{nome}/{peso}/{altura}/{genero}', function ($nome, $peso, $altura, $genero) {

    $genero = strtolower($genero);

    if(!floatval($peso) || !floatval($altura)) {
        return 'Seguimento de URL peso ou altura recebeu um valor não numérico';
    }

    if ($genero !== "masculino" && $genero !== "feminino") {
        return 'Seguimento de URL recebeu um valor diferente de masculino ou feminino';
    }

    if($genero === "masculino") {
        $abreviação = "Sr.";
    } else {
        $abreviação = "Sra.";
    }

    $imc = floatval($peso) / (floatval($altura) ** 2);
    $faixas = [
        18.5 => "Abaixo do peso",
        24.9 => "Peso normal",
        29.9 => "Sobrepeso",
        34.9 => "Obesidade grau 1",
        39.9 => "Obesidade grau 2",
        40.0 => "Obesidade grau 3"
    ];

    foreach ($faixas as $faixa => $value) {
        if($imc <= $faixa) {
            return "Olá $abreviação  $nome, seu IMC é ". number_format($imc, 2, '.'). " Você tem ".PHP_EOL.$value;
        }
    }
});
