<?php
    include("Security/conexaoBanco.php");
    include("Security/nivelAcesso.php");
    permissaoGeral();

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
    <link rel="stylesheet" type="text/css" href="css/styleNavegacao.css">
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
</head>
<body class="body">
    <!-- navegação do site -->
    <nav class="navbar navbar-expand-lg navbar-light nav">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="#"><h1>LOGO</h1></a>

            <!-- BUTTON BURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- CONTENT NAVIGATION -->
            <div class="collapse navbar-collapse items-nav" id="navbarNav">
                <ul class="navbar-nav list-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nossos produtos</a>
                    </li>
                </ul>
                <ul class="navbar-nav list-nav">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?php while($exibeIMG = $consultaIMG->fetch_array()) { ?>
                                <img src="IMG/<?php echo $exibeIMG['IMG']; ?>">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php liberaU();liberaPerfilAdm()?>">Perfil</a>
                            <hr>
                            <a class="dropdown-item" href="Security/logout.php">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div class="categorizando">
        <ul>
            <li>Mais vendidos</li>
            <li>Categorias</li>
            <li>Preço baixo</li>
            <li>Preço alto</li>
            <li>Qualidade</li>
        </ul>
    </div> -->

    <!-- liberando funções adm -->
    <section class="container-fluid bg-light content-adm">
        <h2>Funções Adm</h2>
        <?php libera();?>
    </section>

    <!-- <div class="">
        <//?php include("PHP/carrossel.php"); ?>
    </div> -->
    
    <!-- para pesquisa ajax -->
    <script type="text/javascript" src="Javascript/AJAX.js"></script>
    <div class="container" id="Container">
        <h1>Pesquisa de Produtos utilizando AJAX</h1>
        <hr/>
        <h2>Pesquisar Produtos:</h2>
        <div id="Pesquisar">
            Infome o nome:
            <input class="form-control" type="text" name="descricao" id="descricao"/>
            <input type="button" class="btn btn-info" name="btnPesquisar" value="Pesquisar" onclick="getDados();"/>
            <a href="index.php">limpar pesquisa</a>
        </div>
        <hr/>
        <div id="Resultado">

        </div>
    </div>

    <section class="container-fluid content-icons" style="width: 98%;">
        <h1 class="best">Navegue por marca</h1>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="bg-light icons">
                    <!-- xiaomi -->
                    <a href="PHP/xiaomiMarca.php?marca=Xiaomi" class="icons-link">
                        <img class="img-icon" src="IMG/icons/icons8-xiaomi-480.png" title="clique para ver celulares da marca Xiaomi">
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-light icons">
                    <!-- apple -->
                    <a href="" class="icons-link">
                        <img class="img-icon" src="IMG/icons/icons8-apple-logo-480.png" title="clique para ver celulares da marca Apple">
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-light icons">
                    <!-- samsung -->
                    <a href="PHP/samsungMarca.php?marca=Samsung" class="icons-link">
                        <img class="img-icon" src="IMG/icons/icons8-samsung-480.png" title="clique para ver celulares da marca Samsung">
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-light icons">
                    <!-- motorola -->
                    <a href="PHP/motorolaMarca.php?marca=Motorola" class="icons-link">
                        <img class="img-icon" src="IMG/icons/icons8-motorola-480.png" title="clique para ver celulares da marca Motorola">
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- dados php para produtos -->
    <?php 
        $conRecebePesquisaProduto = @mysqli_query($conexao, "SELECT * FROM produto");
    ?>
    <section class="content-list container-fluid" style="width: 98%;">
        <h1 class="best">Nossos produtos</h1>
        <div class="row">
            <?php while($dado = $conRecebePesquisaProduto->fetch_array()) { ?>
                <!-- clique na div pai de cada elemento -->
                <div class="col-md-2 content-start">
                    <div class=" bg-light box-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-img">
                                    <h1 style="display: none"><?php echo $dado['ID'];?></h1>
                                    <img src="IMG/imgProduto/<?php echo $dado['IMG'];?>">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="content-info">
                                    <h4>R$ <?php echo $dado['PRECO'];?></h4>
                                    <p><?php echo $dado['DESCRICAO'];?></p>
                                </div>
                                <div class="content-button">
                                    <a href="PHP/produtoClicado.php?idProduto=<?php echo $dado['ID']; ?>">
                                        <button class="btn btn-block btn-info">
                                            Visualizar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- fim row -->
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- fim row -->
    </section>

    <!-- script para efeitos e ações (modal) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>
</html>