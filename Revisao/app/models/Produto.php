<?php

class Produto
{
    private $nome;
    private $descricao;
    private $preco;
    private $id;

    public function __construct($nome, $descricao, $preco, $id = null){
        $this->nome = $nome;
        $this->descricao = $descricao;

        $this->preco = $preco;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

}