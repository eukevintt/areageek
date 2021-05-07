<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <div class="navbar-brand">AreaGeek</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo @$index ?>" aria-current="page" href="<?php echo (($editorVe || $categoriaVe || $admVe)) ? "../index.php" : "index.php"; ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo @$filmes ?>" href="<?php echo (($categoriaVe) ? "filmes.php" : ($editorVe || $admVe)) ? "../categorias/filmes.php" : "categorias/filmes.php" ?>">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo @$series ?>" href="<?php echo (($categoriaVe) ? "series.php" : ($editorVe || $admVe)) ? "../categorias/series.php" : "categorias/series.php" ?>">Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo @$musicas ?>" href="<?php echo (($categoriaVe) ? "musicas.php" : ($editorVe || $admVe)) ? "../categorias/musicas.php" : "categorias/musicas.php" ?>">Músicas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo @$hqs ?>" href="<?php echo (($categoriaVe) ? "hqs.php" : ($editorVe || $admVe)) ? "../categorias/hqs.php" : "categorias/hqs.php" ?>">HQ's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo @$noticias ?>" href="<?php echo (($categoriaVe) ? "hqs.php" : ($editorVe || $admVe)) ? "../categorias/noticias.php" : "categorias/noticias.php" ?>">Notícias</a>
                </li>
                <?php
                if (isEditor() || isAdmin()) {
                    echo "<li class='nav-item'>
                            <a class='nav-link " . @$novaMat . "' href=";
                    echo (($editorVe === true) ? "nova-materia.php" : ($categoriaVe || $admVe)) ? "../editor/nova-materia.php" : "editor/nova-materia.php";
                    echo ">Nova Noticia</a>
                        </li>";
                }

                if (isAdmin()) {

                    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adm-dropdown" aria-controls="adm-dropdown" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="adm-dropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ' . @$cadastro . '" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Administrador
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">';
                    echo "<li class='nav-item'>
                        <a class='nav-link text-dark' href=";
                    echo ($editorVe || $categoriaVe || $admVe) ? "../cadastro.php" : "cadastro.php";
                    echo ">Cadastrar Usuário</a>
                            </li>";

                    echo "<li class='nav-item'>
                        <a class='nav-link text-dark' href=";
                    echo (($admVe) ? "relacao-usu.php" : ($editorVe || $categoriaVe)) ? "../adm/relacao-usu.php" : "adm/relacao-usu.php";
                    echo ">Relação usuários</a>
                            </li>";

                    echo "<li class='nav-item'>
                        <a class='nav-link text-dark' href=";
                    echo (($admVe) ? "relacao-cat.php" : ($editorVe || $categoriaVe)) ? "../adm/relacao-cat.php" : "adm/relacao-cat.php";
                    echo ">Relação Categorias</a>
                            </li>";

                    echo "<li class='nav-item'>
                        <a class='nav-link text-dark' href=";
                    echo (($admVe) ? "relacao-ass.php" : ($editorVe || $categoriaVe)) ? "../adm/relacao-ass.php" : "adm/relacao-ass.php";
                    echo ">Relação Assuntos</a>
                            </li>";

                    echo "<li class='nav-item'>
                        <a class='nav-link text-dark' href=";
                    echo (($admVe) ? "relacao-mat.php" : ($editorVe || $categoriaVe)) ? "../adm/relacao-mat.php" : "adm/relacao-mat.php";
                    echo ">Relação Matérias</a>
                            </li>";
                    echo '</ul>
                      </li>
                    </ul>
                  </div>';
                }
                ?>
            </ul>
            <?php
            echo "<div class='d-flex'>";
            if (isLogado()) {
                echo "<a href='#' class='btn btn-light me-2'>Meu perfil</a>";
                echo "<a href='";
                echo ($editorVe || $categoriaVe || $admVe) ? "../logout.php'" : "logout.php'";
                echo "class='btn btn-danger'>Sair</a>";
            } else {
                echo "<a href='";
                echo ($editorVe || $categoriaVe || $admVe) ? "../login.php'" : "login.php'";
                echo (@$clickedLogin == false) ? "class='btn btn-light me-2'>Login</a>" : "class='btn btn-dark me-2'>Login</a>";
                echo "<a href='";
                echo ($editorVe || $categoriaVe || $admVe) ? "../cadastro.php'" : "cadastro.php'";
                echo (@$clickedCad == false) ? "class='btn btn-light me-2'>Cadastrar-se</a>" : "class='btn btn-dark me-2'>Cadastrar-se</a>";
            }
            echo "</div>";
            ?>


        </div>
    </div>
</nav>