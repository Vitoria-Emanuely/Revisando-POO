
    <h1>Detalhes da Categoria - <?= $categoria->getNome();?></h1>
    <p>Descrição: <?= $categoria->getDescricao(); ?></p>

    <a href="categorias?acao=alterar$id=<?= $categoria->getId(); ?> ">Editar a categoria</a>
    <br>
    <a href="categorias?acao=excluir">Excluir a categoria</a>