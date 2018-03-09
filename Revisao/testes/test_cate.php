<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 09:01
 */

require_once "../app/models/Categoria.php";
require_once "../models/CrudCategoria.php";

//$c1 = new Categoria(1, 'oi', );
//$c1->setId(1);
//$c1->setNome('Esportes');
//$c1->setDescricao('Serve para algo');
//var_dump($c1);

$c2 = new Categoria(2, 'Batata', 'Batata é bom');

var_dump($c2);

//TESTE MÉTODO getCategorias()
$crud = new CrudCategoria();
$cats = $crud->getCategorias();
var_dump($cats);

//TESTE MÉTODO getCategoria()
$cat = $crud ->getCategoria(1);
var_dump($cat);

$cat2 = new Categoria(2, 'Nami', 'Peixa diferente');
$crud = new CrudCategoria();
$res = $crud->insertCategoria($cat2);
echo $res;
