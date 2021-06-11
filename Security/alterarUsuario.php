<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de usuário/senha</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background-color: white;
        }

        .content {
            padding: 0 50px 20px 50px;
            text-align: center;
        }

        .content-top {
            text-align: center;
            background-color: RGBA(44, 66, 161, 0.2);
            padding: 50px;
        }

        h3 {
            color: #2c42a1;
            font-weight: bold;
        }

        .form {
            margin-top: 50px;
        }

        .form-2 {
            text-align: left;
            padding: 50px 0;
        }

        .search {
            width: 300px;
            font-weight: bold;
        }

        .button-search {
            border-radius: none;
            border: none;
            background-color: #2c42a1;
            font-size: 16px;
            padding: 5px 20px;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
        }

        label {
            color: #2c42a1;;
        }

        .button {
            border-radius: none;
            border: none;
            background-color: #2c42a1;
            font-size: 20px;
            padding: 15px 30px;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        h2 {
            color: #2c42a1;
            font-weight: bold;
        }

        @media screen and (max-width: 768px){
            h2 {
                color: #2c42a1;
                font-weight: bold;
                font-size: 25px;
            }
        }

        .icon-form {
            width: 250px;
            height: 250px;
            color: #2c42a1;
            margin: 0 30px 30px 30px;
        }

        @media screen and (max-width: 768px){
            .icon-form {
                display: none;
            }
        }
    </style>
</head>
<body>
    <?php
        include("conexaoBanco.php");
        
        $CPF = $_GET['pesquisa'];
        $con = @mysqli_query($conexao,"SELECT * FROM usuario WHERE CPF='$CPF'");
    ?>
    <div class="container-fluid content-top">
        <h3>Insira no campo abaixo seu CPF, para que possamos recupera os dados de sua conta.</h3>
        <form class="form form-group" action="alterarUsuario.php" post="get">
            <div class="form-group d-flex justify-content-center">
                <input class="form-control search" placeholder="insira seu CPF aqui." type="search" name="pesquisa" title="insira seu CPF aqui, para pesquisar em nosso banco de dados.">
            </div>
            <input class="button-search" type="submit" value="Pesquisar" title="Clique aqui para pesquisar o seu cpf em nosso banco de dados.">
        </form>
    </div>
    <header class="container-fluid content">
        <?php while($dados = $con->fetch_array()) { ?>
            <!-- Formulário de Alteração -->
            <form class="container form-2" action="validacaoAlterUser.php" method="post">
                <h2>Dados para cadastro</h2>
                <div class="row">
                    <div class="col-md-6">
                        <label>Usuário</label>
                        <input class="form-control" type="text" name="usuario" maxlength="25" value='<?php echo $dados['NOME'] ?>' title="nome de usuário para alterar!"/><br>

                        <label>Senha</label>
                        <input class="form-control" type="text" name="senha" value='<?php echo $dados['SENHA'] ?>' title="senha de usuário para alterar!"/><br>

                        <label>CPF</label>
                        <input class="form-control" type="text" name="cpf" readonly value='<?php echo $dados['CPF'] ?>' title="CPF referente a pesquisa!"/><br>

                        <input class="btn-block button" type="submit" value="Alterar" title="clique aqui para alterar os dados de usuário e voltar para a tela de login."/>
                    </div>
                    <div class="col-md-6">
                        <svg class="icon-form" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-ui-checks-grid" viewBox="0 0 16 16">
                        <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-3zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-3zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-3zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2z"/>
                        </svg>
                    </div>
                </div>
            </form>
        <?php } ?>
    </header>
</body>
</html>