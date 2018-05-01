<h2>Inserir Produto</h2>

<form method="post" action="?acao=inserir">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" />
    <br>
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
    <br>

    <label for="preco">Preço</label>
    <input name="preco" type="number" step="0.01" class="form-control" id="preco" />
    <br>
    <input type="submit" name="gravar" value="Gravar"/>

</form>