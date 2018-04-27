<h1>Produtos</h1>
<a href="?acao=inserir">Inserir produto</a>
<table>
    <tr>
        <th>#</th>
        <th>Nome do Produto</th>
    </tr>

    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= $produto->getId(); ?></td>
            <td><a href="?acao=exibir&id=<?= $produto->getId(); ?>"><?= $produto->getNome(); ?></a></td>
        </tr>
    <?php endforeach; ?>

</table>
