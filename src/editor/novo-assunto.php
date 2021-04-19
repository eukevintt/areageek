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
        if (!isset($_POST['assunto'])) {
            require "../forms/form-novo-assunto.php";
        } else {
            $assunto = $_POST['assunto'] ?? null;

            if (empty($assunto)) {
                echo 'Todos os dados são obrigatório!';
                require "../forms/form-novo-assunto.php";
            } else {
                $q = "insert into assunto (nome_ass) values ('$assunto')";
                if ($banco->query($q)) {
                    echo 'Categoria cadastrada!';
                    require "../forms/form-novo-assunto.php";
                } else {
                    echo 'Não foi possivel criar a categoria';
                    require "../forms/form-novo-assunto.php";
                }
            }
        }
        ?>
    </div>
</body>

</html>