<?php 
    include_once("../Security/conexaoBanco.php");

    //recebe parametros por get
    $id_vendaAberta = $_GET['IdCompraAberta'];
    $id_usuario = $_GET['IdUsuario'];
    $id_produto = $_GET['IdProduto'];
    $quantidade = $_GET['qtd'];
    $preco = $_GET['preco'];

    $sql = @mysqli_query($conexao, "INSERT INTO carrinho VALUES(0, '$id_vendaAberta', '$id_usuario', '$id_produto', '$quantidade', '$preco', now())");

    if (!$sql){
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        echo "<script>alert('Produto adicionado no carrinho!'); window.location=' ../index.php';</script>";
        // header('Location: ../index.php');
    }

    mysqli_close($conexao);
?>