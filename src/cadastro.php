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
    require_once "includes/conectar.php";
    require_once "includes/funcoes.php";
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

            if ($senha1 === $senha2) {
                if (empty($nick) || empty($nome) || empty($senha1) || empty($senha2) || empty($email)) {
                    echo 'Todos os dados são obrigatório!';
                    require "forms/form-cadastrar-usu.php";
                } else {
                    $senha = gerarHash($senha1);
                    $q = "insert into usuario (nick, nome, senha, email) values ('$nick', '$nome', '$senha', '$email')";
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
</body>

</html>