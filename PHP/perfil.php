<?php
    //conexao com o banco
    include("../Security/conexaoBanco.php");

    $id = $_GET['id'];

    $consulta = "SELECT * FROM usuario WHERE ID = '$id'";

    //variavel que trata a consulta ou retorna um erro
    $con = @mysqli_query($conexao, $consulta);
?>

<!-- Inicio html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!-- css navegação-->
    <link rel="stylesheet" href="../css/styleNavegacao.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <h1>Perfil</h1>

    <!-- inicio tabela -->
    <table style="border:1px solid black; margin: 50px;">
        <tr style="background-color: beige;">
            <td style="padding: 15px;">Nome</td>
            <td style="padding: 15px;">Senha</td>
            <td style="padding: 15px;">CPF</td>
            <td style="padding: 15px;">Imagem</td>
            <td>Ações</td>
        </tr>
        <!-- começando a lista de usuarios da tabela usuario -->
        <?php while($dado = $con->fetch_array()) { ?>
        <tr>
            <td><?php echo $dado['NOME'];?></td>
            <td><?php echo $dado['SENHA'];?></td>
            <td><?php echo $dado['CPF'];?></td>
            <td><?php echo $dado['IMG'];?></td>

            <td>
                <button><a href="alterarPerfil.php?id=<?php echo $dado['ID']; ?>">
                Alterar</a></button>

                <button><a href="alterarFotoPerfil.php?id=<?php echo $dado['ID']; ?>">
                Foto</a></button>
            </td>
        </tr>
        <?php } ?>
    </table>


</body>
</html>