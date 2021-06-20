<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/styleLogin.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>

<body class="body">

    <header class="content container-fluid">
        <div class="content-center container-fluid">
            <div class="row boxs  align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="box-info">
                        <img src="../IMG/icons/logoblack-removebg-preview.png" style="width: 100%;">
                        <p>Garanta hoje mesmo um celular novinho e de alta qualidade, temos várias marcas ao seus dispor.</p>
                        <div class="gallery row" style="padding: 30px 0;">
                            <div class="col-md-12">
                                <?php include("../PHP/carrossel.php"); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <!-- formulário de login -->
                    <form class="form-group box-form" action="validacao.php" method="post">
                        <h2>Login</h2>
                        <!-- input user -->
                        <div class="form-group box-group">
                            <label for="txUsuario">Username</label>
                            <input class="form-control" type="text" name="usuario" id="txUsuario" placeholder="type here your name..." maxlength="25" title="Type here your name!"/>
                        </div>
                        <!-- input password -->
                        <div class="form-group box-group">
                            <label for="txSenha">Password</label>
                            <input class="form-control" type="password" name="senha" id="txSenha" placeholder="type here your password..." title="type here your password!" />
                        </div>
                        <!-- buttons -->
                        <div class="box-form-submit">
                            <button type="submit" class="btn-block button" title="clique aqui para fazer login!">Sign in</button><br>
                            <!-- button modal -->
                            <a href="#" class="a-cad" data-toggle="modal" data-target="#idmodalCadastrar" title="clique aqui caso não tenha uma conta e queira se cadastrar!">Não tem uma conta? clique aqui e cadastre-se!</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- the end row -->
        </div>
        <!-- inicio modal de cadastro de usuário -->
        <div class="modal fade" id="idmodalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="modal-color">
                    <!-- Aqui chama o título do modal -->
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Dados para cadastro</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Aqui chama o Body dele (conteúdo) -->
                    <div class="modal-body" style="text-align: left" style="padding: 30px">
                        <?php include("../PHP/modalCadastrar.php");?>
                    </div>
                    <!-- <div class="modal-footer">
                        <button style="color: black" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- the end modal -->
    </header>

    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>