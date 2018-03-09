<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:51
 */

require_once "../app/models/Produto.php";

$prod = new Produto('Batata', 'Batata é bom', 'algo', 23, 1);
var_dump($prod);