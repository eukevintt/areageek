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
        if (!isset($_POST['categoria'])) {
            require "../forms/form-nova-categoria.php";
        } else {
            $categoria = $_POST['categoria'] ?? null;

            if (empty($categoria)) {
                echo 'Todos os dados são obrigatório!';
                require "../forms/form-nova-categoria.php";
            } else {
                $q = "insert into categorias (nome_cat) values ('$categoria')";
                if ($banco->query($q)) {
                    echo 'Categoria cadastrada!';
                    require "../forms/form-nova-categoria.php";
                } else {
                    echo 'Não foi possivel criar a categoria';
                    require "../forms/form-nova-categoria.php";
                }
            }
        }
        ?>
    </div>
</body>

</html>