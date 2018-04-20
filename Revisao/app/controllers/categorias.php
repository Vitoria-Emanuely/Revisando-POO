<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:25
 */
//Controlador

/* AÇÃO PRINCIPAL = LISTAR TODAS AS CATEGORIAS */

  require_once '../models/CrudCategoria.php';

  if (isset($_GET['acao'])) {
      $acao = $_GET['acao'];
  }else{
      $acao = 'index';
  }

  switch ($acao){
      case 'index':
          $crud = new CrudCategoria();
          $categorias = $crud->getCategorias();
          include '../views/templates/cabecalho.php';
          include '../views/categorias/index.php';
          include '../views/templates/rodape.php';
          break;

      case 'exibir':
          $id = $_GET['id'];
          $crud = new CrudCategoria();
          $categoria = $crud->getCategoria($id);
          include '../views/templates/cabecalho.php';
          include '../views/categorias/exibir.php';
          include '../views/templates/rodape.php';
          break;

      case 'inserir':
          if (!isset($_POST['gravar'])) {
              $id = $_POST['id'];
              include '../views/templates/cabecalho.php';
              include '../views/categorias/inserir.php';
              include '../views/templates/rodape.php';
          }else{
              //gravar dados digitados no BD
              $nome = $_POST['nome'];
              $descricao = $_POST['descricao'];
              $novaCat = new Categoria(null, $nome, $descricao);
              $crud = new CrudCategoria();
              $res = $crud->insertCategoria($novaCat);

              header('Location: categorias.php');
          }
          break;

      case 'alterar':
          if (!isset($_POST['gravar'])) {
              include '../views/templates/cabecalho.php';
              include '../views/categorias/inserir.php';
              include '../views/templates/rodape.php';
          }else{
              //gravar dados digitados no BD
              $nome = $_POST['nome'];
              $descricao = $_POST['descricao'];
              $novaCat = new Categoria(null, $nome, $descricao);
              $crud = new CrudCategoria();
              $res = $crud->insertCategoria($novaCat);

              header('Location: categorias.php');
          }
          break;


      default: //CASO NÃO SEJA NENHUM DOS ANERIORES
          echo "Invalid action";
  }
