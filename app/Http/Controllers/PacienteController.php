<?php

namespace App\Http\Controllers;

class PacienteController extends Controller
{
    public function  calcularIMC($nome, $peso, $altura, $genero)
    {
        $resposta = array();
        $genero = strtolower($genero);

        if(!floatval($peso) || !floatval($altura)) {
            $resposta['status'] = 'danger';
            $resposta['mensagem'] = 'Seguimento de URL peso ou altura recebeu um valor não numérico';
            return view('imc', ['resposta' => $resposta]);
        }

        if ($genero !== "masculino" && $genero !== "feminino") {
            $resposta['status'] = 'danger';
            $resposta['mensagem'] =  'Seguimento de URL recebeu um valor diferente de masculino ou feminino';
            return view('imc', ['resposta' => $resposta]);
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
                $resposta['status'] = 'danger';
                if ($faixa === 24) {

                    $resposta['status'] = 'success';
                }
                $resposta['mensagem'] = "Olá $abreviação  $nome, seu IMC é ". number_format($imc, 2, '.'). " Você está ".PHP_EOL.$value;
                return view('imc', ['resposta' => $resposta]);
            }
        }
    }
}
