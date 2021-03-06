<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Notícias | ÁreaGeek</title>
</head>

<body>
    <?php
    require_once "../includes/conectar.php";
    require_once "../includes/funcoes.php";
    $editorVe = false;
    $noticias = 'active';
    $categoriaVe = true;
    $admVe = false;
    include "../includes/menu.php";

    ?>

    <div class="container py-4">
        <?php

        $busca = $banco->query('select titulo, sub_tit as subtit, img, msg from noticia where id_cat = 5 ORDER BY data_not DESC');
        echo "<div class='row'>";
        while ($reg = $busca->fetch_object()) {
            echo "<div class='col-md-4'><div clas='card' style='width: 18rem;'>";
            echo "<img src='../img/noticias/" . $reg->img . "' class='card-img-top'>";
            echo "<p class='btn-warning w-50 text-center text-white'>" . $reg->msg . "</p>";
            echo "<div class='pb-5'>";
            echo "<h5 class='card-title'>" . $reg->titulo . "</h5>";
            echo "<p class='card-text'>" . $reg->subtit . "</p>";
            echo "</div></div></div>";
        }
        echo "</div>";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>