<?php
include "../includes/funcoes.php";
include "../includes/conectar.php";

if (isset($_POST['nick'])) {
    $nick = $_POST['nick'];
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $senha1 = $_POST['senha1'] ?? null;
    $senha2 = $_POST['senha2'] ?? null;
    $q = "update usuario set nome = '$nome', email= '$email'";
    if (!(empty($senha1) || is_null($senha1))) {
        if ($senha1 === $senha2) {
            $senha = gerarHash($senha1);
            $q .= ", senha='$senha'";
        } else {
            echo "<script>alert('As senhas não conferem!')</script>";
            echo "<script>setTimeout(function(){
                window.location='../adm/relacao-usu.php'
            }, 2000)</script>";
        }
    }
    $q .= " where nick='$nick'";

    $banco->query($q);
    echo "<script>window.location='../adm/relacao-usu.php'</script>";
}

if (isset($_POST['idCat'])) {
    $id = $_POST['idCat'];
    $nome = $_POST['nomeCat'];

    if (empty($nome) || is_null($nome)) {
        echo "<script>alert('O campo é obrigatório')</script>";
        echo "<script>setTimeout(function(){
                window.location='../adm/relacao-cat.php'
            }, 1000)</script>";
    } else {
        $banco->query("update categorias set nome_cat = '$nome' where id_cat='$id'");
        echo "<script>window.location='../adm/relacao-cat.php'</script>";
    }
}

if (isset($_POST['idAss'])) {
    $id = $_POST['idAss'];
    $nome = $_POST['nomeAss'];

    if (empty($nome) || is_null($nome)) {
        echo "<script>alert('O campo é obrigatório')</script>";
        echo "<script>setTimeout(function(){
                window.location='../adm/relacao-ass.php'
            }, 1000)</script>";
    } else {
        $banco->query("update assunto set nome_ass = '$nome' where id_ass ='$id'");
        echo "<script>window.location='../adm/relacao-ass.php'</script>";
    }
}

if (isset($_POST['idMat'])) {
    $id = $_POST['idMat'];

    if (empty($nome) || is_null($nome)) {
        echo "<script>alert('O campo é obrigatório')</script>";
        echo "<script>setTimeout(function(){
                window.location='../adm/relacao-ass.php'
            }, 1000)</script>";
    }
    // } else {
    //     $banco->query("update assunto set nome_ass = '$nome' where id_ass ='$id'");
    //     echo "<script>window.location='../adm/relacao-ass.php'</script>";
    // }
}
