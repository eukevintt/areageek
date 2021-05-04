<?php
include "../includes/conectar.php";

if (isset($_GET['del'])) {
    $nick = $_GET['del'];
    $banco->query("delete from usuario where nick = '$nick'");
    echo "<script>window.location = '../adm/relacao-usu.php'</script>";
}
