<?php
//Controlador

/* AÇÃO PRINCIPAL = LISTAR TODOS OS PRODUTOS */

require_once '../models/CrudProdutos.php';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':
        $crud = new CrudProdutos();
        $produtos = $crud->getProdutos();
        include '../views/templates/cabecalho.php';
        include '../views/produtos/index.php';
        include '../views/templates/rodape.php';
        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new CrudProdutos();
        $produto = $crud->getProduto($id);
        include '../views/templates/cabecalho.php';
        include '../views/produtos/exibir.php';
        include '../views/templates/rodape.php';
        break;

    case 'inserir':
        if (!isset($_POST['gravar'])) {

            include '../views/templates/cabecalho.php';
            include '../views/produtos/inserir.php';
            include '../views/templates/rodape.php';
        }else{
            //gravar dados digitados no BD
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            //$foto = $_POST['foto'];
            $preco = $_POST['preco'];
            $novoProd = new Produto($nome, $descricao, $preco);
            $crud = new CrudProdutos();
            $res = $crud->insertProduto($novoProd);

            header('Location: produtos.php');
        }
        break;

    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudProdutos();
            $produto = $crud->getProduto($id);
            include '../views/templates/cabecalho.php';
            include '../views/produtos/alterar.php';
            include '../views/templates/rodape.php';
        }else{
            //gravar dados digitados no BD
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $novoProd = new Produto($nome, $descricao, $preco, $id);
            $crud = new CrudProdutos();
            $res = $crud->editarProduto($novoProd);

            header('Location: produtos.php');
        }
        break;

    case 'excluir':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudProdutos();
            $produto = $crud->getProduto($id);
            include '../views/templates/cabecalho.php';
            include '../views/produtos/excluir.php';
            include '../views/templates/rodape.php';
        }else{
            //gravar dados digitados no BD
            $id = $_POST['id'];

            $crud = new CrudProdutos();
            $res = $crud->deletarProduto($id);

            if ($res == 1){
                header('Location: produtos.php');
            }else{
                echo 'Não foi possível efetuar a exclusão!';
                echo '<a href="produtos.php">Voltar</a>';

            }

        }
        break;


    default: //CASO NÃO SEJA NENHUM DOS ANTERIORES
        echo "Invalid action";
}
