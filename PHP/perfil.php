<?php
    //conexao com o banco
    include("../Security/conexaoBanco.php");

    $id = $_GET['id'];

    $sql = @mysqli_query($conexao, "SELECT * FROM usuario WHERE ID ='$id'");
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
        <h1>Perfil</h1>
        <!-- inicio tabela -->
        <table class="table">
            <!-- NOME -->
            <?php while($dado = $sql->fetch_array()) { ?>
                <tr class="bg-light">
                    <td style="padding: 10px; font-weight: bold; font-size: 18px">Nome</td>
                </tr>
                <tr>
                    <td style="padding: 25px;"><?php echo $dado['NOME'];?></td>
                </tr>

                <!-- SENHA -->
                <tr class="bg-light">
                    <td style="padding: 10px; font-weight: bold; font-size: 18px">Senha</td>
                </tr>
                <tr>
                    <td style="padding: 25px;"><?php echo $dado['SENHA'];?></td>
                </tr>

                <!-- CPF -->
                <tr class="bg-light">
                    <td style="padding: 10px; font-weight: bold; font-size: 18px">CPF</td>
                </tr>
                <tr>
                    <td style="padding: 25px;"><?php echo $dado['CPF'];?></td>
                </tr>

                <!-- IMAGEM -->
                <tr class="bg-light">
                    <td style="padding: 10px; font-weight: bold; font-size: 18px">Imagem</td>
                </tr>
                <tr>
                    <td style="padding: 25px;"><img style="width: 100px;" src="../IMG/<?php echo $dado['IMG'];?>"></td>
                </tr>

                <!-- AÇÕES -->
                <tr class="bg-light">
                    <td style="padding: 10px; font-weight: bold; font-size: 18px">Ações</td>
                </tr>
                <tr>
                    <td style="padding: 25px;">
                        <button class="btn-block button" data-toggle="modal" data-target="#idmodalAlterar<?php echo $dado['ID']; ?>">Alterar</button>
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
                                            $resultadoA = @mysqli_query($conexao, "SELECT * FROM usuario WHERE ID = '$ID'");

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
                                        <form action="alterarPerfilCon.php" method="post">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>ID</label>
                                                    <input class="form-control" type="number" name="id" value='<?php echo $dadosA['ID']; ?>' readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Nome</label>
                                                    <input class="form-control" type="text" name="nome" value='<?php echo $dadosA['NOME'] ;?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Senha</label>
                                                    <input class="form-control" type="text" name="senha" value='<?php echo $dadosA['SENHA']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>CPF</label>
                                                    <input class="form-control" type="number" name="cpf" value='<?php echo $dadosA['CPF']; ?>'>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="status">Status</label>
                                                    <select class="form-control input-lg" name="status"  value='<?php echo $dados['ATIVO']; ?>'>
                                                        <option value="1">Ativo</option>
                                                        <option value="0">Inativo</option>
                                                    </select>
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

                        <button class="btn-block button" data-toggle="modal" data-target="#idmodalAlterarFoto<?php echo $dado['ID']; ?>">Alterar foto de perfil de usuário</button>
                        <!-- inicio modal de alteração de produto -->
                        <div class="modal fade" id="idmodalAlterarFoto<?php echo $dado['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            $resultadoA = @mysqli_query($conexao, "SELECT * FROM usuario WHERE ID = '$ID'");

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
                                        <form action="alterarFotoPerfilCon.php" method="post">
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
                                                    </svg>Subir imagem de usuário</label>
                                                    <input type="file" name="img" id="img">
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn-block button" type="submit" name="send">Alterar foto de usuário</button>
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
    </section>

    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>