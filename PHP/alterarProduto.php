<?php
    // inclui apenas uma vez a conexão com o banco
    include_once("../Security/conexaoBanco.php");

    //recuperar o id que passamos pela URL
    $id = $_GET['id'];

    //selecionando o usuario com o id fornecido
    $select = "SELECT * FROM produto WHERE ID = '$id'";

    $resultado = @mysqli_query($conexao, "SELECT * FROM produto WHERE ID = '$id'");

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        $num = @mysqli_num_rows($resultado);
        if ($num == 0) {
            echo "ID: Não localizado!" . '<br><br>';
            echo '<input type="button" onclick="window.location' . "'produtoLista.php'" . ';"value="Voltar">';
        } else {
            $dados = mysqli_fetch_array($resultado);
        }
    }

    //fecha conexao com o banco
    mysqli_close($conexao);
?>
<!-- inicio HTML -->
<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Alterando Produto</h1>

    <form action="alterarProdutoCon.php" method="post">
        <h3>ID</h3>
        <input type="number" name="id" value='<?php echo $dados['ID']; ?>' readonly>

        <h3>Descrição</h3>
        <input type="text" name="descricao" value='<?php echo $dados['DESCRICAO'] ;?>'>

        <h3>Marca</h3>
        <input type="text" name="marca" value='<?php echo $dados['MARCA']; ?>'>

        <h3>Preço</h3>
        <input type="number" name="preco" value='<?php echo $dados['PRECO']; ?>'>

        <h3>Imagem</h3>
        <input type="text" name="img" value='<?php echo $dados['IMG']; ?>'>

        <h3>Cor</h3>
        <input type="text" name="cor" value='<?php echo $dados['COR']; ?>'>

        <h3>Armazenamento</h3>
        <input type="text" name="armazenamento" value='<?php echo $dados['ARMAZENAMENTO']; ?>'>

        <h3>Memória RAM</h3>
        <input type="text" name="ram" value='<?php echo $dados['RAM']; ?>'>

        <h3>Tela</h3>
        <input type="text" name="tela" value='<?php echo $dados['TELA']; ?>'>

        <h3>Peso</h3>
        <input type="text" name="peso" value='<?php echo $dados['PESO']; ?>'>

        <h3>Qualidade</h3>
        <input type="text" name="qualidade" value='<?php echo $dados['QUALIDADE']; ?>'>

        <br><br>
        <button type="submit" name="send">Alterar</button>
    </form>
    
</body>
</html>