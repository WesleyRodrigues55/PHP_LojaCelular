<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de usuário/senha</title>
</head>
<body>
    <?php
        include("conexaoBanco.php");

        $CPF = $_GET['pesquisa'];
        $con = @mysqli_query($conexao,"SELECT * FROM usuario WHERE CPF='$CPF'") or die($mysqli->error);
    ?>

    <form action="alterarUsuario.php" post="get">
        <Label>Pesquisar</Label>
        <input type="search" name="pesquisa">
        <input type="submit" value="pesquisar usuário">
    </form>

    <?php while($dados = $con->fetch_array()) { ?>
        <!-- Formulário de Alteração -->
        <form action="validacaoAlterUser.php" method="post">
            <h1>Dados para cadastro</h1>
            <label>Usuário</label>
            <input type="text" name="usuario" maxlength="25" value='<?php echo $dados['NOME'] ?>' /><br>

            <label>Senha</label>
            <input type="text" name="senha" value='<?php echo $dados['SENHA'] ?>'/><br>

            <label>CPF</label>
            <input type="text" name="cpf" readonly value='<?php echo $dados['CPF'] ?>'/><br>

            <input type="submit" value="Alterar" />
        </form>
    <?php } ?>
</body>
</html>