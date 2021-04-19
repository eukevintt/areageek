<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "includes/conectar.php";
    require_once "includes/funcoes.php";
    ?>

    <div>
        <?php
        $nick = $_POST['nick'] ?? null;
        $pass = $_POST['senha'] ?? null;

        if (is_null($nick) || is_null($pass)) {
            require "forms/form-login.php";
        } else {
            $q = "select nick, nome, senha, nivel from usuario where nick = '$nick'";
            $busca = $banco->query($q);
            if (!$busca) {
                echo 'Errado!';
            } else {
                if ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($pass, $reg->senha)) {
                        $_SESSION['user'] = $reg->nick;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['nivel'] = $reg->nivel;
                        echo "logado";
                    } else {
                        echo 'Senha inválida!';
                        require "forms/form-login.php";
                    }
                } else {
                    echo 'Usuário errado!';
                    require "forms/form-login.php";
                }
            }
        }
        ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>