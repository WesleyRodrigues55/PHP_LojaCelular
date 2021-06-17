<?php
    include("../Security/nivelAcesso.php");
    permissaoGeralNav();
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
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nossos produtos</a>
                    </li>
                </ul>
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
</body>
</html>