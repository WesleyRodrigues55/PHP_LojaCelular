<?php
    //conexao com o banco
    include_once("../Security/conexaoBanco.php");

    //recebendo dados do formulário para alteração
    $id = $_POST['id'];
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

    //fazendo o update no banco na tabela usuário
    $update = "UPDATE produto SET DESCRICAO = '$descricao', MARCA = '$marca', PRECO = $preco, IMG = '$img', COR = '$cor', ARMAZENAMENTO = '$armazenamento', RAM = '$ram', TELA = '$tela', PESO = '$peso', QUALIDADE = '$qualidade' WHERE ID = '$id'";

    //instruções de erro SQL
    $resultado = @mysqli_query($conexao,$update);

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        Header('Location: produtoLista.php?txtpesquisar=');
    }

    //fechar conexao com o banco
    mysqli_close($conexao);
?>