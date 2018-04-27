<h1>Detalhes do Produto - <?= $produto->getNome();?></h1>
<p>Descrição: <?= $produto->getDescricao(); ?></p>

<a href="?acao=alterar&id=<?= $produto->getId(); ?>">Editar o produto</a>
<br>
<a href="?acao=excluir&id=<?= $produto->getId(); ?>">Excluir o produto</a>