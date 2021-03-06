<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Nova Notícia | ÁreaGeek</title>
</head>

<body>
    <?php
    require_once "../includes/conectar.php";
    require_once "../includes/funcoes.php";
    $editorVe = true;
    $categoriaVe  = false;
    $novaMat = 'active';
    $admVe = false;
    include "../includes/menu.php";

    if (isUsu() || !isLogado()) {
        echo '<div class="alert alert-danger text-center fade show w-50 mx-auto" role="alert"><i class="material-icons float-start">pan_tool</i>Parado ai, você acessou uma página restrita, volte para o inicio!</div>';
        exit;
    }
    ?>

    <div class='container'>
        <div class='py-4'>
            <a href="novo-assunto.php" class="btn btn-warning">Novo Assunto</a>
            <a href="nova-categoria.php" class="btn btn-warning">Nova Categoria</a>
        </div>
        <?php
        if (!isset($_POST['titulo'])) {
            require "../forms/form-nova-materia.php";
        } else {
            $titulo = $_POST['titulo'] ?? null;
            $msg = $_POST['msg'] ?? null;
            $subtit = $_POST['subtit'] ?? null;
            $texto = $_POST['texto'] ?? null;
            $editor = $_POST['editor'] ?? null;
            $assunto = $_POST['assunto'] ?? null;
            $categoria = $_POST['categoria'] ?? null;


            $extensao = strtolower(substr($_POST['image'], -4));
            $novoNome = md5(time()) . $extensao;
            $diretorio = "../img/noticias/";
            move_uploaded_file($_FILES['image']['tmp_name'], $diretorio . $novoNome);


            if (empty($titulo) || empty($msg) || empty($subtit) || empty($texto) || empty($editor) || empty($assunto) || empty($categoria)) {
                echo 'Todos os dados são obrigatório!';
                require "../forms/form-nova-materia.php";
            } else {
                $q = "insert into noticia (titulo, msg, img, sub_tit, texto, usua_nick, id_ass, data_not, id_cat) values ('$titulo', '$msg', '$novoNome', '$subtit', '$texto', '$editor', '$assunto', NOW(), '$categoria')";
                if ($banco->query($q)) {
                    echo 'Noticia cadastrada!' . $extensao;
                    require "../forms/form-nova-materia.php";
                } else {
                    echo 'Não foi possivel criar a noticia';
                    require "../forms/form-nova-materia.php";
                }
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>