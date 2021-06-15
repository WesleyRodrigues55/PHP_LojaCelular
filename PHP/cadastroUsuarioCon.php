<?php
    //conexão com o banco de dados
    include("../Security/conexaoBanco.php");

    //receber valores do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $nivel = $_POST['nivel'];
    $img = $_POST['img'];
    $status = $_POST['status'];

    //variavel que insere dados na tabela usuario
    $insert = "INSERT INTO usuario VALUES(0, '$nome', '$senha', $cpf, '$nivel', '$img', '$status')";

    //executando instrução SQL (tratar erros)
    $resultado = @mysqli_query($conexao, $insert);

    //tratação de erro com if e else
    if (!$resultado)
    {
        //mata o processo caso a conexao não dê certo
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        //exibe uma mensagem na tela de sucesso no insert
        // echo "Registro cadastrado com sucesso!";
        header('Location: ../index.php?pesquisar=');
    }

    //método para fechar conexao
    mysqli_close($conexao);
?>