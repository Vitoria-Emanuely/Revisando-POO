<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1>Categorias</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Nome da Categoria</th>
        </tr>
<?php foreach ($categorias as $categoria): ?>
        <tr>
            <td><?= $categoria->getId(); ?></td>
            <td><?= $categoria->getNome(); ?></td>
        </tr>
<?php endforeach; ?>

    </table>
</body>
</html>
