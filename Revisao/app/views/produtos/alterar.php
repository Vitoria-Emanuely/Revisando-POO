
<h2>Alterar Produto</h2>

<form method="post" action="app/controllers/produtos.php?acao=alterar">

    <label for="nome">Nome</label>
    <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
    <input type="text" name="nome" id="nome" value="<?= $produto->getNome(); ?>"/>
    <br>
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3"><?= $produto->getDescricao(); ?></textarea>
<br>
    <label for="foto">Foto</label>
    <input type="image" src="" <?= $produto->getFoto(); ?> >
    <br>
    <label for="preco">Preço</label>
    <input name="preco" type="number" step="0.01" class="form-control" id="preco"<?= $produto->getPreco(); ?> >
    <br>
<input type="submit" name="gravar" value="Gravar"/>

</form>