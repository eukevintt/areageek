<form action="cadastro.php" method="post">
    Nick: <input type="text" name="nick" id="nick">
    Nome: <input type="text" name="nome" id="nome">
    E-mail: <input type="email" name="email" id="email">
    Senha: <input type="password" name="senha1" id="senha1">
    Confirmação senha: <input type="password" name="senha2" id="senha2">
    <button type="submit">Cadastrar</button>
    <?php
    if (isAdmin()) {
        echo "<select name='nivel' id='nivel'>
        <option value='usu'>Usuário</option>
        <option value='editor'>Editor</option>
        <option value='admin'>Administrador</option>
        </select>";
    }
    ?>
</form>