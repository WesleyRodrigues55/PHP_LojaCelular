<?php
    include("Security/conexaoBanco.php");
    include("Security/nivelAcesso.php");
    permissaoGeral();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <!-- css -->
    <link rel="stylesheet" href="css/styleNavegacao.css">
    <link rel="stylesheet" href="css/styleIndex.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body class="body">
    <!-- navegação do site -->
    <nav class="navbar navbar-expand-lg navbar-light position-fixed nav">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="#"><h1>LOGO</h1></a>

            <!-- BUTTON BURGER -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- CONTENT NAVIGATION -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Security/logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
            <li>Todos os produtos</li>
        </ul>
    </div> -->

    <div class="" style="margin: 5px;">
        <?php libera();liberaU()?>
    </div>

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

    <!-- dados php para produtos -->
    <?php 
        $conRecebePesquisaProduto = @mysqli_query($conexao, "SELECT * FROM produto");
    ?>
    <section class="content-list container-fluid" style="width: 98%;">
        <h1 class="best">Melhores no mercado</h1>
        <div class="row">
            <?php while($dado = $conRecebePesquisaProduto->fetch_array()) { ?>
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
                                <div class="col-md-12">
                                    <div class="content-button">
                                        <a href="PHP/produtoClicado.php?idProduto=<?php echo $dado['ID']; ?>">
                                            <button class="btn btn-block btn-info">
                                                Visualizar
                                            </button>
                                        </a>
                                    </div>
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

    <a href="PHP/samsungMarca.php?marca=Samsung"><button class="btn btn-primary" style="margin: 5px">Samsung</button></a>
    <a href="PHP/xiaomiMarca.php?marca=Xiaomi"><button class="btn btn-primary" style="margin: 5px">Xiaomi</button></a>
    <a href="PHP/motorolaMarca.php?marca=Motorola"><button class="btn btn-primary" style="margin: 5px">Motorola</button></a>

    
    <!-- script para efeitos e ações (modal) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>
</html>