<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Relação de Usuários</title>
</head>

<body>
    <?php
    require_once "../includes/conectar.php";
    require_once "../includes/funcoes.php";
    $editorVe = false;
    $categoriaVe  = false;
    $admVe = true;
    include "../includes/menu.php";

    ?>
    <h1 class="display-3 text-center">Relação Usuários</h1>
    <div class="container">
        <table id="relacaoUsu" class="display table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Nivel</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $busca = $banco->query('select nick, nome, email, nivel from usuario');
                while ($reg = $busca->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $reg->nome . "</td>";
                    echo "<td>" . $reg->email . "</td>";
                    echo "<td>" . $reg->nivel . "</td>";
                    echo "<td><a href='" . modalDelete($reg->nick, $reg->nome) . "'data-bs-toggle='modal' data-bs-target='#del" . $reg->nick . "'><i class='material-icons px-3'>person_remove</i></a>";
                    echo "<a href='" . modalEdit($reg->nick, $reg->nome, $reg->email) . "'data-bs-toggle='modal' data-bs-target='#edit" . $reg->nick . "'><i class='material-icons'>edit</i></a>
                    </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#relacaoUsu').DataTable();
        });
    </script>
</body>

</html>