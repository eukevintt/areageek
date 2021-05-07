<?php
include "../includes/conectar.php";

if (isset($_GET['delusu'])) {
    $nick = $_GET['delusu'];
    $banco->query("delete from usuario where nick = '$nick'");
    echo "<script>window.location = '../adm/relacao-usu.php'</script>";
}
