<?php
    //conexao com o banco
    include_once("../Security/conexaoBanco.php");

    //recebendo dados do formulário para alteração
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $nivel = $_POST['nivel'];
    $ativo = $_POST['status'];

    //fazendo o update no banco na tabela usuário
    $update = "UPDATE usuario SET NOME = '$nome', SENHA = '$senha', CPF = $cpf, NIVEL = '$nivel', ATIVO = '$ativo' WHERE ID = '$id'";

    //instruções de erro SQL
    $resultado = @mysqli_query($conexao,$update);

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        Header('Location: usuarioLista.php?pesquisar=');
    }

    //fechar conexao com o banco
    mysqli_close($conexao);
?>