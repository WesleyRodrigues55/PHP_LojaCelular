<?php 
    include("../Security/conexaoBanco.php");
    // recebe id do produto clicado
    $idProduto = $_GET['idProduto']; 

    $consulta = @mysqli_query($conexao, "SELECT * FROM produto WHERE ID = '$idProduto'");

    if (!$consulta){
        die('Query inválida: ' . @mysqli_error($conexao));
    } else {

    }
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
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>

    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <div class="container" style="margin-top: 50px;">
        <?php while($listaProduto = $consulta->fetch_array()) {?>
            <div class="row">
                <div class="col-md-5">
                    <img src="../IMG/imgProduto/<?php echo $listaProduto['IMG'];?>" style="width: 90%">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo $listaProduto['DESCRICAO'];?></h2>
                            <div class="d-flex jsutify-content-around">
                                <p>Marca: <?php echo $listaProduto['MARCA'];?></p>
                                <p>Cor: <?php echo $listaProduto['COR'];?></p>
                                <p>Qualidade: <?php echo $listaProduto['QUALIDADE'];?></p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h1>Características:</h1>
                                <h4>Marca: <span class=""><?php echo $listaProduto['MARCA'];?></span></h4>
                                <h4>Cor:  <span class=""><?php echo $listaProduto['COR'];?></span></h4>
                                <h4>Armazenamento:  <span class=""><?php echo $listaProduto['ARMAZENAMENTO'];?></span></h4>
                                <h4>RAM:  <span class=""><?php echo $listaProduto['RAM'];?></span></h4>
                                <h4>Tela:  <span class=""><?php echo $listaProduto['TELA'];?></span></h4>
                                <h4>Peso:  <span class=""><?php echo $listaProduto['PESO'];?></span></h4>
                                <h4>Qualidade:  <span class=""><?php echo $listaProduto['QUALIDADE'];?></span></h4>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <h1>Preço:</h1>
                                <h1>R$ <span class=""><?php echo $listaProduto['PRECO'];?></span></h1>
                                <a href="">
                                    <button class="btn btn-success">
                                        Comprar
                                    </button>
                                </a>
                            </div>
                        </div>  
                    </div>
                    <!-- fim row -->
                </div>
            </div> 
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

    <div class="container">
    <h1>Produtos referente a marca: <?php echo $marca;?></h1>
        <div class="row">
            <?php while($categoria = $sql->fetch_array()){?>

                <div class="col-md-3 card card-body">
                    <h1><?php echo $categoria['MARCA'];?></h1>
                    <img src="../IMG/imgProduto/<?php echo $categoria['IMG'];?>" style="width:50%">
                </div>

            <?php } ?>
        </div>
    </div>


    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>