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

    <h1>Alterando Perfil</h1>

    <form action="alterarPerfilCon.php" method="post">
        <h3>ID</h3>
        <input type="text" name="id" value='<?php echo $dados['ID']; ?>' readonly>

        <h3>Nome</h3>
        <input type="text" name="nome" value='<?php echo $dados['NOME']; ?>'>

        <h3>Senha</h3>
        <input type="text" name="senha" value='<?php echo $dados['SENHA']; ?>'>

        <h3>CPF</h3>
        <input type="text" name="cpf" value='<?php echo $dados['CPF']; ?>'>

        <div class="form-group">
        <label for="status"><h3>Status</h3></label>
            <select class="form-control input-lg" name="status"  value='<?php echo $dados['ATIVO']; ?>'>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
         </div>

        <br><br>
        <button type="submit" name="send">Alterar</button>
    </form>
    
</body>
</html>