<?php

require_once '../models/Produto.php';
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
        //FAZ CONEXÃO                             //CRIA A CONSULTA
        $consulta = $this->conexao->query("SELECT * FROM produto WHERE id_produto = $id");
        //TRANSFORMA RESULTADO EM ARRAY
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);
        //INSTANCIA UM OBJETO DO TIPO CATEGORIA COM OS VALORES RECEBIDOS E O RETORNA
        return new Produto($produto['nome_produto'], $produto['descricao_produto'], $produto['preco_produto'], $produto['id_produto']);
    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM produto");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {
            $listaProdutos[] = new Produto($produto['nome_produto'], $produto['descricao_produto'], $produto['preco_produto'], $produto['id_produto']);
        }
        return $listaProdutos;
    }

    public function insertProduto (Produto $prod)
    {
        $dados[] = $prod->getNome();
        $dados[] = $prod->getDescricao();
        $dados[] = $prod->getPreco();
        $sql = "INSERT INTO produto (nome_produto, descricao_produto, preco_produto, id_categoria) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '2')";
        try{
            $res = $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e){
            return $e->getMessage();
        }

    }

    public function editarProduto(Produto $prod){
        $nome = $prod->getNome();
        $descricao = $prod->getDescricao();
        $preco = $prod->getPreco();
        $id_produto = $prod->getId();
        $sql = "UPDATE produto SET nome_produto='$nome',descricao_produto='$descricao', preco_produto='$preco' WHERE id_produto = $id_produto";
        try {
            $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletarProduto($id_produto){
        $sql = "DELETE FROM produto WHERE id_produto = $id_produto";
        try{
            $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }

    }

}

