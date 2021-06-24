<h1 class='display-3 text-center pb-5'>Nova Notícia</h1>
<form action="nova-materia.php" method="post" class='row g-3' enctype="multipart/form-data">
    <div class="col-md-12">
        <label for='titulo' class='form-label'>Titulo</label>
        <input type="text" name="titulo" id="titulo" class='form-control' required>
    </div>
    <div class="col-md-12">
        <label for='msg' class='form-label'>Mensagem</label>
        <input type="text" name="msg" id="msg" class='form-control' required>
    </div>
    <div class="col-md-12">
        <label for='subtit' class='form-label'>Sub-Titulo</label>
        <input type="text" name="subtit" id="subtit" class='form-control' required>
    </div>
    <div class="col-md-12">
        <label for='texto' class='form-label'>Texto</label>
        <textarea name="texto" id="texto" cols="30" rows="10" class='form-control' required></textarea>
    </div>
    <div class="col-md-12">
        <label for='img' class='form-label'>Imagem</label>
        <input type="file" name="image" id="image" class='form-control'>
    </div>
    <?php
    if (isAdmin()) {


        echo '<div class="col-md-4">
        <label for="editor" class="form-label">Editor Nome</label>
        <select name="editor" id="editor" class="form-select" required>
        ?>
            <option value="" selected>Selecione</option>'; ?>
    <?php

        $busca = $banco->query('select nick, nome from usuario where nivel = "editor" or nivel="admin"');
        while ($reg = $busca->fetch_object()) {
            echo "<option value='$reg->nick'>$reg->nome</option>";
        }

        echo "</select>
    </div>";
    }
    ?>

    <?php
    if (isEditor()) {
        echo '<div class="col-md-4">
        <label for="editor" class="form-label">Editor Nome</label>
        <select name="editor" id="editor" class="form-select" required>
        ?>'; ?>
    <?php

        $busca = $banco->query('select nick, nome from usuario where nivel = "editor" or nivel="admin"');
        echo "<option value='" . $_SESSION['user'] . "'>" . $_SESSION['nome'] . "</option>";
        echo "</select>
    </div>";
    }
    ?>

    <div class="col-md-4">
        <label for='assunto' class='form-label'>Assunto</label>
        <select name="assunto" id="assunto" class='form-select' required>
            <option value="" selected>Selecione</option>
            <?php
            $busca2 = $banco->query('select * from assunto');
            while ($reg2 = $busca2->fetch_object()) {
                echo "<option value='$reg2->id_ass'>$reg2->nome_ass</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for='categoria' class='form-label'>Categoria</label>
        <select name="categoria" id="categoria" class='form-select' required>
            <option value="" selected>Selecione</option>
            <?php
            $busca3 = $banco->query('select * from categorias');
            while ($reg3 = $busca3->fetch_object()) {
                echo "<option value='$reg3->id_cat'>$reg3->nome_cat</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class='btn btn-success mb-5'>Enviar</button>
</form>