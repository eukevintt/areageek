<form action="nova-materia.php" method="post">
    titulo<input type="text" name="titulo" id="titulo" required>
    msg<input type="text" name="msg" id="msg" required>
    subtit<input type="text" name="subtit" id="subtit" required>
    texto<textarea name="texto" id="texto" cols="30" rows="10" required></textarea>
    img<input type="file" name="img" id="img">
    Editor Nome<select name="editor" id="editor" required>
        <option value="">Selecione</option>
        <?php
        $busca = $banco->query('select nick, nome from usuario where nivel = "editor"');
        while ($reg = $busca->fetch_object()) {
            echo "<option value='$reg->nick'>$reg->nome</option>";
        }
        ?>
    </select>
    Assunto<select name="assunto" id="assunto" required>
        <option value="">Selecione</option>
        <?php
        $busca2 = $banco->query('select * from assunto');
        while ($reg2 = $busca2->fetch_object()) {
            echo "<option value='$reg2->id_ass'>$reg2->nome_ass</option>";
        }
        ?>
    </select>
    Categoria<select name="categoria" id="categoria" required>
        <option value="">Selecione</option>
        <?php
        $busca3 = $banco->query('select * from categorias');
        while ($reg3 = $busca3->fetch_object()) {
            echo "<option value='$reg3->id_cat'>$reg3->nome_cat</option>";
        }
        ?>
    </select>
    <button type="submit">Enviar</button>
</form>