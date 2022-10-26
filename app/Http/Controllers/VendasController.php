<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendasCollection;
use App\Http\Resources\VendasResource;
use App\Models\Venda;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class VendasController extends Controller
{

    public function listarVendas()
    {
        try {
            echo "##Produtos## <br> <br>";
            $produtos = Venda::get();
            foreach ($produtos as $produto) {
                $preço = number_format ($produto->preco_unitario, 2, ',', '.');
                $calculoTotal = $produto->preco_unitario * $produto->quantidade;
                $total = number_format ($calculoTotal, 2, ',', '.');
                echo "
                - Produto: $produto->produto <br>
                - Quant.: $produto->quantidade <br>
                - Preço Unitário: R$ $preço <br>
                - Total: R$ $total <br>
                ================================================================ <br>
            ";
            }
        } catch (\Exception $exception) {
            return ['message' => 'Erro ao tentar listar os registros', 'deatils' => $exception->getMessage()];
        }
    }

    public function cadastrarVenda($produto, $preco, $quantidade)
    {
        try {
            Venda::create([
                'produto'        => $produto,
                'preco_unitario' => $preco,
                'quantidade'     => $quantidade
            ]);
            return ['message' => 'Registro inserido com sucesso!'];
        } catch (\Exception $exception) {
            return ['message' => 'Erro ao tentar cadastrar o registro', 'deatils' => $exception->getMessage()];
        }
    }

    public function verVenda($id)
    {
        try {
            $produto = Venda::findOrFail($id);
            $preço = number_format ($produto->preco_unitario, 2, ',', '.');
            $calculoTotal = $produto->preco_unitario * $produto->quantidade;
            $total = number_format ($calculoTotal, 2, ',', '.');
            echo "## $produto->produto ## <br> <br>
            - Quant.: $produto->quantidade <br>
            - Preço Unitário: R$ $preço <br>
            - Total: R$ $total <br>
            ================================================================
            ";
        } catch (\Exception $exception) {
            return ['message' => 'Erro ao tentar listar o registro', 'deatils' => $exception->getMessage()];
        }
    }

    public function atualizarVenda($id, $produto, $preco, $quantidade)
    {
        try {
            $venda = Venda::findOrFail($id);
            $venda->update([
                'produto'        => $produto,
                'preco_unitario' => $preco,
                'quantidade'     => $quantidade
            ]);
            return ['message' => 'Registro atualizado com sucesso!'];
        } catch (\Exception $exception) {
            return ['message' => 'Erro ao tentar atualizar o registro', 'deatils' => $exception->getMessage()];
        }
    }

    public function excluirVenda($id)
    {
        try {
            Venda::destroy($id);
            return 'Registro excluido com sucesso!';
        } catch (\Exception $exception) {
            return ['message' => 'Erro ao tentar excluir o registro', 'details' => $exception->getMessage()];
        }
    }
}
