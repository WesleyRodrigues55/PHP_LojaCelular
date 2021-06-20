<?php
    include("../Security/conexaoBanco.php");
    include("../Security/nivelAcesso.php");
    permissaoGeralNav();
    //receb o ID do nivel de acesso e mantem ele fixo na variavel
    $recebeID = GetId();
    $consultaIMG = @mysqli_query($conexao, "SELECT usuario.IMG FROM usuario WHERE ID='$recebeID'");
    //recebe o ID do nivel de acesso e mantem ele fixo na variavel
    $recebeIDCompraAberta = GetIdInicioVenda();
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
<body class="body">
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
                            <a class="dropdown-item" href="<?php liberaUNav2();liberaPerfilAdmNav2()?>">Perfil</a>
                            <hr>
                            <a class="dropdown-item" href="../Security/logout.php">Sair</a>
                        </div>
                    </li>
                </ul>
                <!-- botão que abre modal carrinho -->
                <button class="btn button-carrinho" data-toggle="modal" data-target="#idmodalCarrinho<?php echo $recebeIDCompraAberta; ?>"><img class="carrinho" src="../IMG/icons/add_shopping_cart_white_24dp.svg" title="seu carrinho!">
                
                    <!-- necessário para contar itens no carrinho -->
                    <?php 
                        $x = @mysqli_query($conexao, "SELECT * FROM carrinho WHERE ID_COMPRA_ABERTA = '$recebeIDCompraAberta'");
                        $a = 0;
                        while ($l = $x->fetch_array()) {
                            $l['ID_PRODUTO'];
                            if ($l != 0) {
                                $a++;
                            }  
                        }
                        echo '<p style="color:white">' .$a . ' ITENS</p>';  
                    ?>
                </button>

                <!-- inicio modal do carrinho -->
                <div class="modal fade" id="idmodalCarrinho<?php echo $recebeIDCompraAberta; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" id="modal-color">
                            <!-- Aqui chama o título do modal -->
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Itens no carrinho!</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Aqui chama o Body dele (conteúdo) -->
                            <div class="modal-body container" style="padding: 10px;">
                                <?php 
                                    $consultaCarrinho = @mysqli_query($conexao, "SELECT carrinho.ID_COMPRA_ABERTA, produto.ID, carrinho.ID_PRODUTO, carrinho.ID, produto.DESCRICAO, carrinho.QUANTIDADE, carrinho.PRECO, carrinho.DATETIME, carrinho.ID_USUARIO FROM carrinho, produto WHERE ID_COMPRA_ABERTA = $recebeIDCompraAberta AND produto.ID = carrinho.ID_PRODUTO AND carrinho.QUANTIDADE = 1");

                                    $somaProd = "SELECT sum(QUANTIDADE * PRECO) as totalProd FROM carrinho WHERE ID_COMPRA_ABERTA = '$recebeIDCompraAberta'"; 

                                    $consultaPreco = @mysqli_query($conexao,$somaProd); 
                                    $totalPreco = mysqli_fetch_array($consultaPreco);
                                ?>
                                <table class="table" style="text-align: center">
                                    <tr class="bg-light">
                                        <!-- <td>Código</td> -->
                                        <!-- <td>Compra aberta</td> -->
                                        <!-- <td>id usuario</td> -->
                                        <!-- <td>Unidade</td> -->
                                        <td>Descrição</td>
                                        <td>Preço</td>
                                        <!-- <td>Data</td> -->
                                        <td>Ação</td>
                                    </tr>
                                    <?php while($ListaCarrinho = $consultaCarrinho->fetch_array()) { ?>
                                        <tr>
                                            <!-- <td><//?php echo $ListaCarrinho['ID']; ?></td> -->
                                            <!-- <td><//?php echo $ListaCarrinho['ID_COMPRA_ABERTA']; ?></td> -->
                                            <!-- <td><//?php echo $ListaCarrinho['ID_USUARIO']; ?></td> -->
                                            <!-- <td><//?php echo $ListaCarrinho['QUANTIDADE']; ?></td> -->
                                            <td><?php echo $ListaCarrinho['DESCRICAO']; ?></td>
                                            <td>R$ <?php echo number_format($ListaCarrinho['PRECO'],2); ?></td>
                                            <!-- <td><//?php echo $ListaCarrinho['DATETIME']; ?></td> -->
                                            <td><button class="btn btn-outline-danger" onclick="apagar()">Cancelar</a></td>
                                            <script>
                                                function apagar(retornaIndex) {
                                                    var confirma = window.confirm("Deseja apagar esse produto de seu carrinho? ");
                                                    if (confirma == true) {
                                                        alert("Produto apagado com sucesso!");
                                                        window.location = 'apagarItensCarrinho.php?idCarrinho=<?php echo $ListaCarrinho['ID']; ?>';
                                                    } else {
                                                        return false;
                                                    }
                                                }
                                            </script>
                                        
                                        </tr>
                                        <script>
                                    function retorna(retornaIndex) {
                                        var confirma = window.confirm("Deseja finalizar sua venda? ");
                                        if (confirma == true) {
                                            alert("Sua sessão será encerrada...");
                                            window.location = 'finalizandoVenda.php?IdCompraAberta=<?php echo $ListaCarrinho['ID_COMPRA_ABERTA']; ?>&idUsuario=<?php echo $ListaCarrinho['ID_USUARIO']; ?>';
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
                                    <?php } ?>
                                </table>
                                <div style="width: 100%; text-align: right">
                                    <h4 class="bg-light" style="padding: 10px">Total: R$ <?php echo number_format($totalPreco['totalProd'],2); ?></h4>
                                </div>

                                
                            </div>
                            <div class="modal-footer">
                                <!-- <button  data-dismiss="modal"></button> -->
                                <!-- botão que abri alert de finalizar venda -->
                                <button type="button" class="btn btn-outline-success" onclick="retorna()">Finalizar venda</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- the end modal alterar -->
            </div>
        </div>
    </nav>

        <!-- script para efeitos e ações (modal) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->
</body>
</html>