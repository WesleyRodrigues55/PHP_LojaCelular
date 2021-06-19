<?php
    include("../Security/conexaoBanco.php");
    include("../Security/nivelAcesso.php");
    permissaoGeralNav();
    //receb o ID do nivel de acesso e mantem ele fixo na variavel
    $recebeID = GetId();
    $consultaIMG = @mysqli_query($conexao, "SELECT usuario.IMG FROM usuario WHERE ID='$recebeID'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <!-- css -->
    <!-- <link rel="stylesheet" href="../css/styleNavegacao.css"> -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- navegação do site -->
    <nav class="navbar navbar-expand-lg nav">
        <div class="container">
            <!-- LOGO -->
            <img class="navbar-brand logo" src="../IMG/icons/logo-removebg-preview.png">

            <!-- BUTTON BURGER -->
            <button class="navbar-toggler navbar-light" style="background: rgba(255, 255, 255, 0.2);" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- CONTENT NAVIGATION -->
            <div class="collapse navbar-collapse items-nav" id="navbarNav">
                <ul class="navbar-nav list-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Nossos produtos</a>
                    </li>
                </ul>
                <ul class="navbar-nav list-nav">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?php while($exibeIMG = $consultaIMG->fetch_array()) { ?>
                                <img src="../IMG/<?php echo $exibeIMG['IMG']; ?>">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php liberaU();liberaPerfilAdmNav2()?>">Perfil</a>
                            <hr>
                            <a class="dropdown-item" href="../Security/logout.php">Sair</a>
                        </div>
                    </li>
                </ul>
                <button class="btn button-carrinho"><img class="carrinho" src="../IMG/icons/add_shopping_cart_white_24dp.svg"></button>
            </div>
        </div>
    </nav>
    <div class="categorizando">
        <ul>
            <li>Mais vendidos</li>
            <li>Categorias</li>
            <li>Preço baixo</li>
            <li>Preço alto</li>
            <li>Qualidade</li>
            <li>Todos os produtos</li>
        </ul>
    </div>

        <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>