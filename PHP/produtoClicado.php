<?php 
    include("../Security/conexaoBanco.php");
    // recebe id do produto clicado
    $idProduto = $_GET['idProduto']; 
    // usado para passar como title o nome do celular clicado
    $descricao = @mysqli_query($conexao, "SELECT * FROM produto WHERE ID = '$idProduto'");

    //usado para listar o celular clicado e exibir na tela para o usuário
    $consulta = @mysqli_query($conexao, "SELECT * FROM produto WHERE ID = '$idProduto'");
    if (!$consulta){
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php while($DescricaoProduto = $descricao->fetch_array()) { echo $DescricaoProduto['DESCRICAO']; }?></title>
    <!-- css -->
    <link rel="stylesheet" href="../css/styleNavegacao.css">
    <link rel="stylesheet" href="../css/styleProdutoClicado.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light body">

    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <div class="container" style="margin-top: 50px;">
        <?php while($listaProduto = $consulta->fetch_array()) {?>
            <div class="row">
                <div class="col-md-5">
                    <img src="../IMG/imgProduto/<?php echo $listaProduto['IMG'];?>" style="width: 90%;">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo $listaProduto['DESCRICAO'];?></h2>
                            <div class="d-flex jsutify-content-around">
                                <p class="pp-header">Marca: <span class="p-header"><?php echo $listaProduto['MARCA'];?></span></p>
                                <p class="pp-header">Cor: <span class="p-header"><?php echo $listaProduto['COR'];?></span></p>
                                <p class="pp-header">Qualidade: <span class="p-header"><?php echo $listaProduto['QUALIDADE'];?></span></p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h1>Características:</h1>
                                <h4>Marca: <span class="info"><?php echo $listaProduto['MARCA'];?></span></h4>
                                <h4>Cor:  <span class="info"><?php echo $listaProduto['COR'];?></span></h4>
                                <h4>Armazenamento:  <span class="info"><?php echo $listaProduto['ARMAZENAMENTO'];?></span></h4>
                                <h4>RAM:  <span class="info"><?php echo $listaProduto['RAM'];?></span></h4>
                                <h4>Tela:  <span class="info"><?php echo $listaProduto['TELA'];?></span></h4>
                                <h4>Peso:  <span class="info"><?php echo $listaProduto['PESO'];?></span></h4>
                                <h4>Qualidade:  <span class="info"><?php echo $listaProduto['QUALIDADE'];?></span></h4>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h1>Preço:</h1>
                                <h2>R$ <?php echo $listaProduto['PRECO'];?></h1>

                                <?php $recebeIDCompraAberta = GetIdInicioVenda(); $recebeID = GetId();?>
                                <a href="adicionarProdutoCarrinho.php?IdCompraAberta=<?php echo $recebeIDCompraAberta ?>&IdUsuario=<?php echo $recebeID ?>&IdProduto=<?php echo $listaProduto['ID'] ?>&qtd=1&preco=<?php echo $listaProduto['PRECO']; ?>">
                                    <button class="btn btn-outline-success">
                                        Adicionar ao carrinho
                                    </button>
                                </a>
                            </div>
                        </div>  
                    </div>
                    <!-- fim row -->
                </div>
            </div> 

        <!-- condição criada para que, quando uma marca for selecionada ao clique "vizualizar" ela traga com ela produtos semelhantes a marca. -->
        <?php 
            $marca = ""; 
            if ($listaProduto['MARCA'] == 'Samsung') {
                $marca = "Samsung";
            }
            if ($listaProduto['MARCA'] == 'Xiaomi') {
                $marca = "Xiaomi";
            }
            if ($listaProduto['MARCA'] == 'Motorola') {
                $marca = "Motorola";
            }
            
            $sql = @mysqli_query($conexao, "SELECT * FROM produto WHERE MARCA = '$marca'");
            
            } //fechamento array produto selecionado
        ?>
    </div>

    <section class="content-list container-fluid" style="width: 98%;">
        <h1>Produtos referente a marca: <?php echo $marca;?></h1>
        <hr>
        <div class="row">
        <?php while($categoria = $sql->fetch_array()){?>
                <!-- clique na div pai de cada elemento -->
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 content-start">
                    <div class="box-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-img">
                                    <h1 style="display: none"><?php echo $categoria['ID'];?></h1>
                                    <img src="../IMG/imgProduto/<?php echo $categoria['IMG'];?>">
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="content-info">
                                    <h4>R$ <?php echo $categoria['PRECO'];?></h4>
                                    <p class="p-ponto"><?php echo $categoria['DESCRICAO'];?></p>
                                </div>
                                <div class="content-button d-flex justify-content-around">

                                    <a href="adicionarProdutoCarrinho.php?IdCompraAberta=<?php echo $recebeIDCompraAberta ?>&IdUsuario=<?php echo $recebeID ?>&IdProduto=<?php echo $categoria['ID'] ?>&qtd=1&preco=<?php echo $categoria['PRECO']; ?>">
                                        <button class="btn btn-outline-success">
                                            Adicionar ao carrinho
                                        </button>
                                    </a>

                                    <a href="produtoClicado.php?idProduto=<?php echo $categoria['ID']; ?>">
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


    <!-- script para efeitos e ações (modal) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>
</html>