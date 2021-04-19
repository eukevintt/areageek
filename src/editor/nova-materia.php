<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../includes/conectar.php";
    require_once "../includes/funcoes.php";
    ?>

    <div>
        <?php
        if (!isset($_POST['titulo'])) {
            require "../forms/form-nova-materia.php";
        } else {
            $titulo = $_POST['titulo'] ?? null;
            $msg = $_POST['msg'] ?? null;
            $subtit = $_POST['subtit'] ?? null;
            $texto = $_POST['texto'] ?? null;
            $img = $_POST['img'] ?? null;
            $editor = $_POST['editor'] ?? null;
            $assunto = $_POST['assunto'] ?? null;
            $categoria = $_POST['categoria'] ?? null;

            if (empty($titulo) || empty($msg) || empty($subtit) || empty($texto) || empty($editor) || empty($assunto) || empty($categoria)) {
                echo 'Todos os dados são obrigatório!';
                require "../forms/form-nova-materia.php";
            } else {
                $q = "insert into noticia (titulo, msg, sub_tit, texto, usua_nick, id_ass, id_cat) values ('$titulo', '$msg', '$subtit', '$texto', '$editor', '$assunto', '$categoria')";
                if ($banco->query($q)) {
                    echo 'Noticia cadastrada!';
                    require "../forms/form-nova-materia.php";
                } else {
                    echo 'Não foi possivel criar a noticia';
                    require "../forms/form-nova-materia.php";
                }
            }
        }
        ?>
    </div>
</body>

</html>