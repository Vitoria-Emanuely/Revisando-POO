<?php

require_once '../models/Categoria.php';
require_once 'DBConnection.php';

class CrudCategoria
{
    private $conexao;
    private $categoria;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getCategoria(int $id)
    {
        //FAZ CONEXÃO                             //CRIA A CONSULTA
        $consulta = $this->conexao->query("SELECT * FROM categoria WHERE id_categoria = $id");
        //TRANSFORMA RESULTADO EM ARRAY
        $categoria = $consulta->fetch(PDO::FETCH_ASSOC);
        //INSTANCIA UM OBJETO DO TIPO CATEGORIA COM OS VALORES RECEBIDOS E O RETORNA
        return new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria'], $categoria['id_categoria']);
    }

    public function getCategorias()
    {
        $consulta = $this->conexao->query("SELECT * FROM categoria");
        $arrayCategorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];
        foreach ($arrayCategorias as $categoria) {
            $listaCategorias[] = new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria'], $categoria['id_categoria']);
        }
        return $listaCategorias;
    }

    public function insertCategoria (Categoria $cat)
    {
        $dados[] = $cat->getNome();
        $dados[] = $cat->getDescricao();
        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('$dados[0]', '$dados[1]')";
        try{
            $res = $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e){
            return $e->getMessage();
        }

    }

    public function editarCategoria(Categoria $cat){

        $nome = $cat->getNome();
        $descricao = $cat->getDescricao();
        $id_categoria = $cat->getId();
        $sql = "UPDATE categoria SET nome_categoria='$nome',descricao_categoria='$descricao' WHERE id_categoria =$id_categoria";
        try {
            $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deletarCategoria($id_categoria){

        $sql = "DELETE FROM categoria WHERE id_categoria = $id_categoria";
        try{
        $this->conexao->exec($sql);
            return true;
        }catch (PDOException $e) {
            return $e->getMessage();
        }

    }

}






