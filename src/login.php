<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>

</html>