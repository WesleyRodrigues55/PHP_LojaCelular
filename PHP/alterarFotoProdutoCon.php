<?php
    //conexao com o banco
    include_once("../Security/conexaoBanco.php");

    //recebendo dados do formulário para alteração
    $id = $_POST['id'];
    $img = $_POST['img'];

    //fazendo o update no banco na tabela usuário
    $update = "UPDATE produto SET IMG = '$img' WHERE ID = '$id'";

    //instruções de erro SQL
    $resultado = @mysqli_query($conexao,$update);

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        Header('Location: produtoLista.php?pesquisar=');
    }

    //fechar conexao com o banco
    mysqli_close($conexao);
?>