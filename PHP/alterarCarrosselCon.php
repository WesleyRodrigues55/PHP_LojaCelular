<?php
    //conexao com o banco
    include_once("../Security/conexaoBanco.php");

    //recebendo dados do formulário para alteração
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $img = $_POST['img'];

    //fazendo o update no banco na tabela usuário
    $update = "UPDATE carrossel SET DESCRICAO = '$descricao', IMG = '$img' WHERE ID = '$id'";

    //instruções de erro SQL
    $resultado = @mysqli_query($conexao,$update);

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        Header('Location: carrosselLista.php?pesquisar=');
    }

    //fechar conexao com o banco
    mysqli_close($conexao);
?>