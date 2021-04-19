<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <div class="navbar-brand">AreaGeek</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo @$index; ?>" aria-current="page" href="<?php echo ($editorVe === true) ? "../index.php" : "index.php"; ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Filmes</a>
                </li>
                <?php
                if (isEditor() || isAdmin()) {
                    echo "<li class='nav-item'>
                            <a class='nav-link " . @$novaMat . "' href=";
                    echo ($editorVe === true) ? "nova-materia.php" : "editor/nova-materia.php";
                    echo ">Nova Noticia</a>
                        </li>";
                }

                if (isAdmin()) {
                    echo "<li class='nav-item'>
                        <a class='nav-link " . @$cadastro . "' href=";
                    echo ($editorVe === true) ? "../cadastro.php" : "cadastro.php";
                    echo ">Cadastrar Usuário</a>
                    </li>";
                }
                ?>
            </ul>
            <?php
            echo "<div class='d-flex'>";
            if (isLogado()) {
                echo "<a href='#' class='btn btn-light me-2'>Meu perfil</a>";
                echo "<a href='";
                echo ($editorVe == true) ? "../logout.php'" : "logout.php'";
                echo "class='btn btn-danger'>Sair</a>";
            } else {

                echo "<a href='";
                echo ($editorVe === true) ? "../login.php'" : "login.php'";
                echo "class='btn btn-light me-2'>Login</a>";
                echo "<a href='";
                echo ($editorVe === true) ? "../cadastro.php'" : "cadastro.php'";
                echo "class='btn btn-light'>Cadastrar-se</a>";
            }
            echo "</div>";
            ?>


        </div>
    </div>
</nav>