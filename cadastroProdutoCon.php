<?php
    //conexão com o banco de dados
    include("../Security/conexaoBanco.php");

    //receber valores do formulário
    $descricao = $_POST['descricao'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $img = $_POST['img'];
    $cor = $_POST['cor'];
    $armazenamento = $_POST['armazenamento'];
    $ram = $_POST['ram'];
    $tela = $_POST['tela'];
    $peso = $_POST['peso'];
    $qualidade = $_POST['qualidade'];

    //variavel que insere dados na tabela usuario
    $insert = "INSERT INTO produto VALUES(0, '$descricao', '$marca', $preco, '$img', '$cor', '$armazenamento', '$ram', '$tela', '$peso', '$qualidade')";

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
        header('Location: cadastroProduto.php?pesquisar=');
    }

    //método para fechar conexao
    mysqli_close($conexao);
?>