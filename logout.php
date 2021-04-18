<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sair</title>
</head>

<body>
    <?php
    require_once "includes/conectar.php";
    require_once "includes/funcoes.php";

    logout();
    echo "<script>
        window.location = 'login.php'
    </script>";
    ?>


</body>

</html>