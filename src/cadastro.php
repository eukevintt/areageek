<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "includes/conectar.php";
    require_once "includes/funcoes.php";
    $editorVe = false;
    $cadastro = 'active';
    $clickedCad = true;
    $categoriaVe  = false;
    include "includes/menu.php";
    ?>

    <div>

        <?php
        if (!isset($_POST['nick'])) {
            require "forms/form-cadastrar-usu.php";
        } else {
            $nick = $_POST['nick'] ?? null;
            $nome = $_POST['nome'] ?? null;
            $email = $_POST['email'] ?? null;
            $senha1 = $_POST['senha1'] ?? null;
            $senha2 = $_POST['senha2'] ?? null;
            $nivel = $_POST['nivel'] ?? "usu";

            if ($senha1 === $senha2) {
                if (empty($nick) || empty($nome) || empty($senha1) || empty($senha2) || empty($email)) {
                    echo 'Todos os dados são obrigatório!';
                    require "forms/form-cadastrar-usu.php";
                } else {
                    $senha = gerarHash($senha1);
                    $q = "insert into usuario (nick, nome, senha, email, nivel) values ('$nick', '$nome', '$senha', '$email', '$nivel')";
                    if ($banco->query($q)) {
                        echo 'Usuário cadastrado!';
                        require "forms/form-cadastrar-usu.php";
                    } else {
                        echo 'Não foi possivel criar o usuário, o usuário já está sendo usado';
                        require "forms/form-cadastrar-usu.php";
                    }
                }
            } else {
                echo "Senhas não conferem!";
            }
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>