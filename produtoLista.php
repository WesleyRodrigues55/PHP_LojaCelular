<?php
    //conexao com o banco
    include("../Security/conexaoBanco.php");

    //variavel que recebe valor em get da pesquisa
    $pesquisar = $_GET['pesquisar'];

    //condição para selecionar pelo nome
    if($pesquisar != ""){
        $consulta = "SELECT * FROM produto where DESCRICAO like '%$pesquisar%'";
    } else{
        $consulta = "SELECT * FROM produto";
    }

    //variavel que trata a consulta ou retorna um erro
    $con = @mysqli_query($conexao, $consulta) or die($mysqli->error);
?>

<!-- Inicio html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produto</title>
</head>
<body>

    <h1>Lista de Produtos</h1>
    <!-- caixa de pesquisa -->
    <form action="produtoLista.php" method="get">
        <label>Pesquisar</label><br>
        <input type="search" name="pesquisar">
        <button type="submit">Pesquisar</button>
    </form>

    <!-- inicio tabela -->
    <table style="border:1px solid black; margin: 50px;">
        <tr style="background-color: beige;">
            <td style="padding: 15px;">ID</td>
            <td style="padding: 15px;">Descrição</td>
            <td style="padding: 15px;">Imagem</td>
        </tr>
        <!-- começando a lista de usuarios da tabela usuario -->
        <?php while($dado = $con->fetch_array()) { ?>
        <tr>
            <td><?php echo $dado['ID'];?></td>
            <td><?php echo $dado['DESCRICAO'];?></td>
            <td><?php echo $dado['IMG'];?></td>

            <td><button><a href="alterarProduto.php?id=<?php echo $dado['ID']; ?>">
            Alterar</a></button></td>

            <td><button><a href="excluirProduto.php?id=<?php echo $dado['ID']; ?>">
            Excluir</a></button></td>
        </tr>
        <?php } ?>
    </table>

    <h1>Cadastrar mais produtos</h1>
    <a href="cadastroProduto.php">Cadastrar</a>


</body>
</html>