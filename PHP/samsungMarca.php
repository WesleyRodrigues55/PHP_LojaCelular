<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">

</head>
<body>
<?php 
include("../Security/conexaoBanco.php");


        $recebeMarca = $_GET['marca'];
        $listaMarca = @mysqli_query($conexao, "SELECT * FROM produto WHERE MARCA = '$recebeMarca'");
    ?>
    <section class="content-list container-fluid" style="width: 98%;">
        <h1 class="best">Melhores no mercado</h1>
        <div class="row">
            <?php while($dado = $listaMarca->fetch_array()) { ?>
                <div class="col-md-2 content-start">
                    <div class=" bg-light box-content">
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
                                <div class="col-md-12">
                                    <div class="content-button">
                                        <a href="produtoClicado.php?idProduto=<?php echo $dado['ID']; ?>">
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
</body>
</html>