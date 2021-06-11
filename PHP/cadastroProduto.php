<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <!-- css navegação-->
    <link rel="stylesheet" href="../css/styleNavegacao.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <!-- inicio formulário usuarios -->
    <h1>Cadastro de Produto</h1>

    <form action="cadastroProdutoCon.php" method="post">
        <label>Descrição</label><br>
        <input type="text" name="descricao"><br><br>

        <label>Marca</label><br>
        <input type="text" name="marca"><br><br>

        <label>Preço</label><br>
        <input type="number" name="preco"><br><br>

        <label>Cor</label><br>
        <input type="text" name="cor"><br><br>

        <label>Armazenamento</label><br>
        <input type="text" name="armazenamento"><br><br>

        <label>Memória RAM</label><br>
        <input type="text" name="ram"><br><br>

        <label>Tela</label><br>
        <input type="text" name="tela"><br><br>

        <label>Peso</label><br>
        <input type="text" name="peso"><br><br>

        <label>Qualidade</label><br>
        <input type="text" name="qualidade"><br><br>

        <label>Imagem</label><br>
        <input type="file" name="img"><br><br>

        <button type="submit" name="send">Cadastrar</button>
    </form>
    
</body>
</html>