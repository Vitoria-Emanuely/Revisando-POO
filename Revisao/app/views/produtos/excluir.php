<h2>Excluir Produto</h2>

<form method="post" action="?acao=excluir">

    <label for="nome">Nome</label>
    <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
    <input type="text" name="nome" id="nome" value="<?= $produto->getNome(); ?>" disabled/>
    <br>
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3" disabled><?= $produto->getDescricao(); ?></textarea>
    <br>
    <input type="submit" name="gravar" value="Gravar"/>

</form>