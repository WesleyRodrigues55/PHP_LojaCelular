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

        /* para input type="file" */
        input[type="file"] {
        display: none;
        }
            
        .upfile {
        padding: 10px 20px;
        background-color: #2c42a1;
        color: white;
        text-transform: uppercase;
        text-align: center;
        margin-top: 10px;
        cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>
    <section class="container">
        <h1>Lista de Produtos</h1>
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
                <td>ID</td>
                <td>Descrição</td>
                <td>Imagem</td>
                <td>Ações</td>
            </tr>
            <!-- começando a lista de usuarios da tabela usuario -->
            <?php while($dado = $con->fetch_array()) { ?>
                <tr class="bg-light">
                    <td><?php echo $dado['ID'];?></td>
                    <td><?php echo $dado['DESCRICAO'];?></td>
                    <td><?php echo $dado['IMG'];?></td>

                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#idmodalAlterar<?php echo $dado['ID']; ?>">
                        <!-- inicio modal de cadastro de usuário -->
                        Alterar</button>
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
                                            $resultadoA = @mysqli_query($conexao, "SELECT * FROM produto WHERE ID = '$ID'");

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
                                        <form action="alterarProdutoCon.php" method="post">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ID</label>
                                                    <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Descrição</label>
                                                    <input class="form-control" type="text" name="descricao" value='<?php echo $dadosA['DESCRICAO'] ;?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Marca</label>
                                                    <input class="form-control" type="text" name="marca" value='<?php echo $dadosA['MARCA']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Preço</label>
                                                    <input class="form-control" type="number" name="preco" value='<?php echo $dadosA['PRECO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Cor</label>
                                                    <input class="form-control" type="text" name="cor" value='<?php echo $dadosA['COR']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Armazenamento</label>
                                                    <input class="form-control" type="text" name="armazenamento" value='<?php echo $dadosA['ARMAZENAMENTO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Memória RAM</label>
                                                    <input class="form-control" type="text" name="ram" value='<?php echo $dadosA['RAM']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tela</label>
                                                    <input class="form-control" type="text" name="tela" value='<?php echo $dadosA['TELA']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Peso</label>
                                                    <input class="form-control" type="text" name="peso" value='<?php echo $dadosA['PESO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Qualidade</label>
                                                    <input class="form-control" type="text" name="qualidade" value='<?php echo $dadosA['QUALIDADE']; ?>'>
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

                        <button class="btn btn-danger" data-toggle="modal" data-target="#idmodalExcluir<?php echo $dado['ID']; ?>">
                        Excluir</button>
                        <!-- inicio modal de cadastro de usuário -->
                        <div class="modal fade" id="idmodalExcluir<?php echo $dado['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="modal-color">
                                    <!-- Aqui chama o título do modal -->
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Dados para exclusão!</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Aqui chama o Body dele (conteúdo) -->
                                    <div class="modal-body" style="text-align: left" style="padding: 30px">
                                        <?php
                                            $ID = $dado['ID'];
                                            //selecionando o usuario com o id fornecido
                                            $selectE = "SELECT * FROM produto WHERE ID = '$ID'";

                                            $resultadoE = @mysqli_query($conexao, $selectE);

                                            if (!$resultadoE) {
                                                die('Query inválida: ' . @mysqli_error($conexao));
                                            } else {
                                                $numE = @mysqli_num_rows($resultadoE);
                                                if ($numE == 0) {
                                                    echo "ID: Não localizado!" . '<br><br>';
                                                    echo '<input type="button" onclick="window.location' . "'produtoLista.php'" . ';"value="Voltar">';
                                                } else {
                                                    $dadosE = mysqli_fetch_array($resultadoE);
                                                }
                                            }
                                        ?>
                                        <form action="excluirProdutoCon.php" method="post">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ID</label>
                                                    <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Descrição</label>
                                                    <input class="form-control" type="text" name="descricao" value='<?php echo $dadosA['DESCRICAO'] ;?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Marca</label>
                                                    <input class="form-control" type="text" name="marca" value='<?php echo $dadosA['MARCA']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Preço</label>
                                                    <input class="form-control" type="number" name="preco" value='<?php echo $dadosA['PRECO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Cor</label>
                                                    <input class="form-control" type="text" name="cor" value='<?php echo $dadosA['COR']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Armazenamento</label>
                                                    <input class="form-control" type="text" name="armazenamento" value='<?php echo $dadosA['ARMAZENAMENTO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Memória RAM</label>
                                                    <input class="form-control" type="text" name="ram" value='<?php echo $dadosA['RAM']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tela</label>
                                                    <input class="form-control" type="text" name="tela" value='<?php echo $dadosA['TELA']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Peso</label>
                                                    <input class="form-control" type="text" name="peso" value='<?php echo $dadosA['PESO']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Qualidade</label>
                                                    <input class="form-control" type="text" name="qualidade" value='<?php echo $dadosA['QUALIDADE']; ?>'>
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
                        <!-- the end modal -->

                        <button class="btn btn-success" data-toggle="modal" data-target="#idmodalFoto<?php echo $dado['ID']; ?>">
                        Alterar foto</button>
                        <!-- inicio modal de cadastro de usuário -->
                        <div class="modal fade" id="idmodalFoto<?php echo $dado['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="modal-color">
                                    <!-- Aqui chama o título do modal -->
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Dados para alteração de foto!</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Aqui chama o Body dele (conteúdo) -->
                                    <div class="modal-body" style="text-align: left" style="padding: 30px">
                                        <?php
                                            $ID = $dado['ID'];
                                            //selecionando o usuario com o id fornecido
                                            $selectF = "SELECT * FROM produto WHERE ID = '$ID'";

                                            $resultadoF = @mysqli_query($conexao, $selectF);

                                            if (!$resultadoF) {
                                                die('Query inválida: ' . @mysqli_error($conexao));
                                            } else {
                                                $numF = @mysqli_num_rows($resultadoF);
                                                if ($numF == 0) {
                                                    echo "ID: Não localizado!" . '<br><br>';
                                                    echo '<input type="button" onclick="window.location' . "'produtoLista.php'" . ';"value="Voltar">';
                                                } else {
                                                    $dadosF = mysqli_fetch_array($resultadoF);
                                                }
                                            }
                                        ?>
                                        <form action="alterarFotoProdutoCon.php" method="post">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ID</label>
                                                    <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <label for="img" class="upfile" title="clique aqui para adicionar uma imagem ao produto.">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                                                    </svg>Subir imagem do produto</label>
                                                    <input type="file" name="img" id="img">
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn-block button" type="submit" name="send">Alterar foto</button>
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
                        <!-- the end modal -->
                    </td>
                </tr>
            <?php } mysqli_close($conexao);?>
        </table>
    </section>

    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>