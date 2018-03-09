<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 09/03/18
 * Time: 08:19
 */

require_once '../app/models/Categoria.php';
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

    public function insertCategoria (Categoria $categoria)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES ('$categoria->getNome', '$categoria->getDescricao')";
        try{
        $this->conexao->exec($sql);
        }catch (PDOException $e){
        return $e->getMessage();

        }

    }

    public function editarCategoria(Categoria $categoria){

        $sql = "UPDATE categoria SET nome_categoria='$nome',descricao_categoria='$descricao' WHERE id_categoria =$id";
        $this->conexao->exec($sql);
    }

    public function deletarCategoria(Categoria $id){
        $this->conexao->exec("DELETE FROM categoria WHERE id_categoria = $id");
    }

}






