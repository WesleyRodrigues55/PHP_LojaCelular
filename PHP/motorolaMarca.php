<?php 
    include("../Security/conexaoBanco.php");
    $recebeMarca = $_GET['marca'];
    $listaMarca = @mysqli_query($conexao, "SELECT * FROM produto WHERE MARCA = '$recebeMarca'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/styleNavegacao.css">
    <link rel="stylesheet" type="text/css" href="../css/styleMarcas.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">

</head>
<body class="body bg-light">

        <!-- chama nossa navegação -->
        <?php include("navegacao.php"); ?>
    <section class="content-list container-fluid" style="width: 98%;">
        <h1 class="best">Nossos produtos</h1>
        <hr>
        <div class="row">
            <?php while($dado = $listaMarca->fetch_array()) { ?>
                <!-- clique na div pai de cada elemento -->
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 content-start">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-img">
                                    <h1 style="display: none"><?php echo $dado['ID'];?></h1>
                                    <img src="../IMG/imgProduto/<?php echo $dado['IMG'];?>">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="content-info">
                                    <h4>R$ <?php echo $dado['PRECO'];?></h4>
                                    <p><?php echo $dado['DESCRICAO'];?></p>
                                </div>
                                <div class="content-button d-flex justify-content-around">

                                    <a href="adicionarProdutoCarrinho.php?IdCompraAberta=<?php echo $recebeIDCompraAberta ?>&IdUsuario=<?php echo $recebeID ?>&IdProduto=<?php echo $dado['ID'] ?>&qtd=1&preco=<?php echo $dado['PRECO']; ?>">
                                        <button class="btn btn-outline-success">
                                            Adicionar ao carrinho
                                        </button>
                                    </a>

                                    <a href="produtoClicado.php?idProduto=<?php echo $dado['ID']; ?>">
                                        <button class="btn btn-block btn-outline-dark">
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

    <?php include("footer.php"); ?>
</body>
</html>