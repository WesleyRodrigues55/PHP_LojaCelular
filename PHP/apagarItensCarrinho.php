<?php
    include_once("../Security/conexaoBanco.php");

    $idCarrinho = $_GET['idCarrinho'];

    $sql = @mysqli_query($conexao, "DELETE FROM carrinho WHERE ID='$idCarrinho'");

    if(!$sql){
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        header('Location: ../index.php');
    }

    mysqli_close($conexao);
?>