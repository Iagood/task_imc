<?php

namespace App\Http\Controllers;

use Exception;

class ProdutoController extends Controller
{
    private $produtos;

    public function __construct($produtos = []){
        $this->produtos = $produtos;
    }

    public function  listarProdutos($tipo = '')
    {
        $tipo = strtolower($tipo);
        if ($tipo !== 'novo' && $tipo !== 'usado' && $tipo !== '') {
            throw new Exception('Por favor, informe um tipo de produto válido!');
        }
    
        $this->setProdutos();
        $produtos = $this->produtos;

        if($tipo === 'novo') {
            $produtos = array_filter($this->produtos, function ($key) {
                return $key["novo"] === true;
            });
            $tipo = 'novos';
        }

        if($tipo === 'usado') {
            $produtos = array_filter($this->produtos, function ($key) {
                return $key["novo"] === false;
            });
            $tipo = 'usados';
        }

        return view('produto', ['produtos' => $produtos, 'tipo' => $tipo]);
    }

    public function setProdutos(): void
    {
        $this->produtos = [
            [
                'nome' => 'Processador Intel I9',
                'categoria' => 'Informática',
                'preco' => 1899.90,
                'novo' => true,
                'promocao' => false
            ],
            [
                'nome' => 'Guitarra Fender Stratocaster',
                'categoria' => 'Instrumentos musicais',
                'preco' => 9899.90,
                'novo' => true,
                'promocao' => false
            ],
            [
                'nome' => 'TV Sony 59"',
                'categoria' => 'Eletrônicos',
                'preco' =>  2499.90,
                'novo' => true,
                'promocao' => true
            ],
            [
                'nome' => 'Soundbar LG XPTO',
                'categoria' => 'Eletrônicos',
                'preco' =>  899.90,
                'novo' => true,
                'promocao' => true
            ],
            [
                'nome' => 'Processador AMD Ryzen 3',
                'categoria' => 'Informática',
                'preco' => 399.90,
                'novo' => false,
                'promocao' => false
            ],
            [
                'nome' => 'iPhone 8 - 64GB',
                'categoria' => 'Celulares',
                'preco' =>  1899.90,
                'novo' => false,
                'promocao' => false
            ],
            [
                'nome' => 'Smartphone Samsung Galaxy S20',
                'categoria' => 'Celulares',
                'preco' =>  1299.90,
                'novo' => false,
                'promocao' => true
            ]
        ];
    }
}
