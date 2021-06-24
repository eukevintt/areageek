<?php
include "../includes/conectar.php";

if (isset($_GET['delusu'])) {
    $nick = $_GET['delusu'];
    $banco->query("delete from usuario where nick = '$nick'");
    echo "<script>window.location = '../adm/relacao-usu.php'</script>";
}

if (isset($_GET['delcat'])) {
    $id = $_GET['delcat'];
    $banco->query("delete from categorias where id_cat = '$id'");
    echo "<script>window.location = '../adm/relacao-cat.php'</script>";
}

if (isset($_GET['delass'])) {
    $id = $_GET['delass'];
    $banco->query("delete from assunto where id_ass = '$id'");
    echo "<script>window.location = '../adm/relacao-ass.php'</script>";
}

if (isset($_GET['delmat'])) {
    $id = $_GET['delmat'];
    $banco->query("delete from noticia where id_not = '$id'");
    echo "<script>window.location = '../adm/relacao-mat.php'</script>";
}
