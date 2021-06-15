<?php
    // inclui apenas uma vez a conexão com o banco
    include_once("../Security/conexaoBanco.php");

    //recuperar o id que passamos pela URL
    $id = $_GET['id'];

    $resultado = @mysqli_query($conexao, "SELECT * FROM usuario WHERE ID = '$id'");

    if (!$resultado) {
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {
        $num = @mysqli_num_rows($resultado);
        if ($num == 0) {
            echo "ID: Não localizado!" . '<br><br>';
            echo '<input type="button" onclick="window.location' . "'perfil.php'" . ';"value="Voltar">';
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

    <h1>Alterarando Foto</h1>

    <form action="alterarFotoPerfilCon.php" method="post">
        <h3>ID</h3>
        <input type="number" name="id" value='<?php echo $dados['ID']; ?>' readonly>

        <h3>Nome</h3>
        <input type="text" name="nome" value='<?php echo $dados['NOME'] ;?>' readonly>

        <h3>CPF</h3>
        <input type="text" name="cpf" value='<?php echo $dados['CPF']; ?>' readonly>

        <h3>Imagem</h3>
        <input type="file" name="img" value='<?php echo $dados['IMG']; ?>'>

        <br><br>
        <button type="submit" name="send">Alterar Foto</button>
    </form>
    
</body>
</html>