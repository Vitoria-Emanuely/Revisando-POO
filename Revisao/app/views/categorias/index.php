<h1>Categorias</h1>
<a href="?acao=inserir">Inserir categoria</a>
    <table>
        <tr>
            <th>#</th>
            <th>Nome da Categoria</th>
        </tr>

<?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?= $categoria->getId(); ?></td>
            <td><a href="?acao=exibir&id=<?= $categoria->getId(); ?>"><?= $categoria->getNome(); ?></a></td>
        </tr>
<?php endforeach; ?>

    </table>
