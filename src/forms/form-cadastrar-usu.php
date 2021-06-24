<h1 class='display-3 text-center m-4'>Cadastro</h1>
<form action="cadastro.php" method="post" class='container'>
    <div class="row">
        <div class="col-md-3">
            <label for='nick' class='form-label'>Nick</label>
            <input type="text" name="nick" id="nick" class='form-control'>
        </div>
        <div class="col-md-4">
            <label for='nome' class='form-label'>Nome</label>
            <input type="text" name="nome" id="nome" class='form-control'>
        </div>
        <div class="col-md-5">
            <label for='email' class='form-label'>E-mail</label>
            <input type="email" name="email" id="email" class='form-control'>
        </div>
        <div class="<?php echo (isAdmin()) ? 'col-md-5' : 'col-md-6' ?>">
            <label for='senha1' class='form-label'>Senha</label>
            <input type="password" name="senha1" id="senha1" class='form-control'>
        </div>
        <div class="<?php echo (isAdmin()) ? 'col-md-5' : 'col-md-6' ?>">
            <label for='senha2' class='form-label'>Confirmação da senha</label>
            <input type="password" name="senha2" id="senha2" class='form-control'>
        </div>



        <?php
        if (isAdmin()) {
            echo "<div class='col-md-2'><label for='nivel' class='form-label'>Nivel</label><select name='nivel' id='nivel' class='form-select'>
        <option value='usu'>Usuário</option>
        <option value='editor'>Editor</option>
        <option value='admin'>Administrador</option>
        </select></div>";
        }
        ?>
    </div>
    <button type="submit" class='btn btn-primary mt-3'>Cadastrar</button>
</form>