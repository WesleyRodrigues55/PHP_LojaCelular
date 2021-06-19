<?php
    include_once("../Security/conexaoBanco.php");

    //recebdno por get
    $idCompra = $_GET['IdCompraAberta'];
    $idUsuario = $_GET['idUsuario'];

    $sql = @mysqli_query($conexao, "INSERT INTO comprafechada VALUES(0, '$idCompra', '$idUsuario', now())");

    if(!$sql){
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
       session_destroy();
       Header('Location: ../Security/login.php');
    }

    mysqli_close($conexao);

?>