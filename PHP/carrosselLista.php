<?php
    //conexao com o banco
    include("../Security/conexaoBanco.php");

    //variavel que recebe valor em get da pesquisa
    $pesquisar = $_GET['pesquisar'];

    //condição para selecionar pelo nome
    if($pesquisar != ""){
        $consulta = "SELECT * FROM carrossel where DESCRICAO like '%$pesquisar%'";
    } else{
        $consulta = "SELECT * FROM carrossel";
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
    <title>Lista Carrossel</title>
    <!-- css navegação-->
    <link rel="stylesheet" href="../css/styleNavegacao.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <style>
        h1 {
            color: #2c42a1;
        }
        .button {
            border-radius: none;
            border: none;
            background-color: #2c42a1;
            font-size: 16px;
            padding: 10px 14px;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <section class="container">
        <h1>Lista de Carrossel</h1>
        <!-- caixa de pesquisa -->
        <form action="produtoLista.php" method="get">
            <div class="row">
                <div class="col-md-6">
                    <label>Pesquisar</label><br>
                    <input class="form-control" type="search" name="pesquisar">
                </div>
                <div class="col-md-12">
                    <button class="button" type="submit">Pesquisar</button>
                </div>
            </div>
        </form>

        <!-- inicio tabela -->
        <table class="table">
            <tr class="bg-dark" style="color: white">
                <td style="padding: 15px;">ID</td>
                <td style="padding: 15px;">Descrição</td>
                <td style="padding: 15px;">Imagem</td>
                <td>Ações</td>
            </tr>
            <!-- começando a lista de usuarios da tabela usuario -->
            <?php while($dado = $con->fetch_array()) { ?>
            <tr>
                <td><?php echo $dado['ID'];?></td>
                <td><?php echo $dado['DESCRICAO'];?></td>
                <td><?php echo $dado['IMG'];?></td>

                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#idmodalAlterar<?php echo $dado['ID']; ?>">Alterar</button>
                    <!-- inicio modal de alteração de produto -->
                    <div class="modal fade" id="idmodalAlterar<?php echo $dado['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" id="modal-color">
                                <!-- Aqui chama o título do modal -->
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Dados para alteração!</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Aqui chama o Body dele (conteúdo) -->
                                <div class="modal-body" style="text-align: left" style="padding: 30px">
                                    <?php 
                                        $ID = $dado['ID'];
                                        $resultadoA = @mysqli_query($conexao, "SELECT * FROM carrossel WHERE ID = '$ID'");

                                        if (!$resultadoA) {
                                            die('Query inválida: ' . @mysqli_error($conexao));
                                        } else {
                                            $numA = @mysqli_num_rows($resultadoA);
                                            if ($numA == 0) {
                                                echo "ID: Não localizado!" . '<br><br>';
                                                echo '<input type="button" onclick="window.location' . "'produtoLista.php'" . ';"value="Voltar">';
                                            } else {
                                                $dadosA = mysqli_fetch_array($resultadoA);
                                            }
                                        }
                                    ?>
                                    <form action="alterarCarrosselCon.php" method="post">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID</label>
                                                <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Descrição</label>
                                                <input class="form-control" type="text" name="descricao" value='<?php echo $dadosA['DESCRICAO'] ;?>'>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Imagem</label>
                                                <input class="form-control" type="text" name="img" value='<?php echo $dadosA['IMG'] ;?>'>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn-block button" type="submit" name="send">Alterar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button style="color: black" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- the end modal alterar -->
                    
                    <button class="btn btn-danger" data-toggle="modal" data-target="#idmodalExcluir<?php echo $dado['ID']; ?>">Excluir</button>
                    <!-- inicio modal de alteração de produto -->
                    <div class="modal fade" id="idmodalExcluir<?php echo $dado['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" id="modal-color">
                                <!-- Aqui chama o título do modal -->
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Dados para alteração!</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                <!-- Aqui chama o Body dele (conteúdo) -->
                                <div class="modal-body" style="text-align: left" style="padding: 30px">
                                    <?php 
                                        $ID = $dado['ID'];
                                        $resultadoA = @mysqli_query($conexao, "SELECT * FROM carrossel WHERE ID = '$ID'");

                                        if (!$resultadoA) {
                                            die('Query inválida: ' . @mysqli_error($conexao));
                                        } else {
                                            $numA = @mysqli_num_rows($resultadoA);
                                            if ($numA == 0) {
                                                echo "ID: Não localizado!" . '<br><br>';
                                                echo '<input type="button" onclick="window.location' . "'produtoLista.php'" . ';"value="Voltar">';
                                            } else {
                                                $dadosA = mysqli_fetch_array($resultadoA);
                                            }
                                        }
                                    ?>
                                    <form action="excluirCarrosselCon.php" method="post">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>ID</label>
                                                <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Descrição</label>
                                                <input class="form-control" type="text" name="descricao" value='<?php echo $dadosA['DESCRICAO'] ;?>' readonly>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Imagem</label>
                                                <input class="form-control" type="text" name="img" value='<?php echo $dadosA['IMG'] ;?>' readonly>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn-block button" type="submit" name="send">Excluir</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button style="color: black" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- the end modal alterar -->
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>