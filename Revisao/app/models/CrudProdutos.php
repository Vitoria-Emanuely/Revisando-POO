<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:04
 */

require_once 'Produto.php';
require_once 'DBConnection.php';

class CrudProdutos
{
    private $conexao;
    private $produto;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getProduto(int $id)
    {
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE id = $id");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);
        return new Produto($produto['nome_produto'], $produto['preco_produto'], $produto['descricao_produto'], $produto['id_produto'], $produto['foto_produto']);
    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM produto");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {
            $listaProdutos[] = new Produto($produto['nome_produto'], $produto['preco_produto'], $produto['descricao_produto'], $produto['id_produto'], $produto['foto_produto']);
        }
        return $listaProdutos;
    }

    public function insertProduto(Produto $produto){

    }

    public function updateProduto(Produto $produto){

    }

}

$crud = new CrudProdutos();
$prod = $crud->getProdutos();

var_dump($prod);


