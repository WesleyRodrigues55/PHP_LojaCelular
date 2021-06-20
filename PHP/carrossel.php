    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- array carrossel -->
<?php
    include("../Security/conexaoBanco.php");
    $consultaCarrossel = @mysqli_query($conexao, "SELECT * FROM carrossel");
    /* Por cada resultado, preparar a saída*/
    $imagesHtml = '';
    $indicatorDotsHtml = '';
    $i = 0;
    while($row = mysqli_fetch_array($consultaCarrossel)) {
        $filename = $row['IMG'];
        $namefilm = $row['DESCRICAO'];
        // classe "active" apenas no primeiro elemento
        $active = $i==0 ? 'active' : '';
        // criar HTML para a imagem
        $imagesHtml.= '
        <div class="carousel-item '.$active.' carrossel" style="text-align: center;">
            <img src="../IMG/imgProduto/'.$filename.'" alt="'.$filename.'" class="animate__slideInRight" style="animation-duration: 1s;margin: 5px; width: 40%"/>
        </div>';
        // criar HTML para o indicador da imagem
        $indicatorDotsHtml.= '
        <li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';
        $i++;
    }
    /* Preparar a saída para o navegador*/
    if (!empty($imagesHtml)) {
        /* Verificar se precisamos de navegação*/
        $navHtml = '';
        if ($i>1) {
            $indicatorsHtml = '
            <ol class="carousel-indicators">
                
            </ol>';
            // .$indicatorDotsHtml. usado em cima
            $navHtml = '
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>';
        }
        /* Enviar saída para o navegador*/
        echo '
        <div data-interval="3500" id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            '.$indicatorsHtml.'
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                '.$imagesHtml.'
            </div>
            
        </div>';
    }
?> 
    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>