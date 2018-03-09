<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 09:01
 */

require_once "../app/models/Categoria.php";

$c1 = new Categoria();
$c1->setId(1);
$c1->setNome('Esportes');
$c1->setDescricao('Serve para algo');
var_dump($c1);

$c2 = new Categoria(2, 'Batata', 'Batata é bom');

var_dump($c2);
