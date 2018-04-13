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
          echo ('<pre>');
          var_dump($categorias);
          include '../views/categorias/index.php';
          break;

      case 'inserir':
          echo "You chosen insert";
          break;

      case 'exibir':
          $id = $_GET['id'];
          $crud = new CrudCategoria();
          $categoria = $crud->getCategoria($id);
          include '../views/categorias/exibir.php';
          break;

      default: //CASO NÃO SEJA NENHUM DOS ANERIORES
          echo "Invalid action";
  }
