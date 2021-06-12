<<<<<<< HEAD
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
    <style>
        h1 {
            color: #2c42a1;
        }

        /* para input type="file" */
        input[type="file"] {
        display: none;
        }
            
        .upfile {
        padding: 10px 20px;
        background-color: #2c42a1;
        color: white;
        text-transform: uppercase;
        text-align: center;
        margin-top: 10px;
        cursor: pointer;
        }

        .button {
        border-radius: none;
        border: none;
        background-color: #2c42a1;
        font-size: 20px;
        padding: 15px 30px;
        color: white;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 20px;
        }

        svg {
        margin-right: 10px;
        }
  </style>
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <!-- inicio formulário usuarios -->
    <form class="form-group container" style="margin-top: 50px;" action="cadastroProdutoCon.php" method="post">
        <h1>Cadastro de Produto</h1>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Descrição</label>
                <input class="form-control" type="text" name="descricao">
            </div>
            <div class="col-md-6">
                <label>Marca</label>
                <input class="form-control" type="text" name="marca">
            </div>
            <div class="col-6 col-md-3">
                <label>Preço</label>
                <input class="form-control" type="number" name="preco">
            </div>
            <div class="col-6 col-md-3">
                <label>Cor</label>
                <input class="form-control" type="text" name="cor">
            </div>
            <div class="col-6 col-md-3">
                <label>Armazenamento</label>
                <input class="form-control" type="text" name="armazenamento">
            </div>
            <div class="col-6 col-md-3">
                <label>Memória RAM</label>
                <input class="form-control" type="text" name="ram">
            </div>
            <div class="col-md-6">
                <label>Tela</label>
                <input class="form-control" type="text" name="tela">
            </div>
            <div class="col-6 col-md-3">
                <label>Peso</label>
                <input class="form-control" type="text" name="peso">
            </div>
            <div class="col-6 col-md-3">
                <label>Qualidade</label>
                <input class="form-control" type="text" name="qualidade">
            </div>
            <div class="col-12 col-md-6">
                <label for="img" class="upfile" title="clique aqui para adicionar uma imagem ao produto.">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                </svg>Subir imagem do produto</label>
                <input type="file" name="img" id="img">
            </div>
            <div class="col-md-12">
                <button class="btn-block button" type="submit" name="send">Cadastrar produto</button>
            </div>
        </div>
    </form>
    
    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
=======
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
    <style>
    h1 {
        color: #2c42a1;
    }

    /* para input type="file" */
    input[type="file"] {
      display: none;
    }
        
    .upfile {
      padding: 10px 20px;
      background-color: #2c42a1;
      color: white;
      text-transform: uppercase;
      text-align: center;
      margin-top: 10px;
      cursor: pointer;
    }

    .button {
      border-radius: none;
      border: none;
      background-color: #2c42a1;
      font-size: 20px;
      padding: 15px 30px;
      color: white;
      font-weight: bold;
      margin-bottom: 10px;
      margin-top: 20px;
    }

    svg {
      margin-right: 10px;
    }
  </style>
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <!-- inicio formulário usuarios -->
    <form class="form-group container" style="margin-top: 50px;" action="cadastroProdutoCon.php" method="post">
        <h1>Cadastro de Produto</h1>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Descrição</label>
                <input class="form-control" type="text" name="descricao">
            </div>
            <div class="col-md-6">
                <label>Marca</label>
                <input class="form-control" type="text" name="marca">
            </div>
            <div class="col-6 col-md-3">
                <label>Preço</label>
                <input class="form-control" type="number" name="preco">
            </div>
            <div class="col-6 col-md-3">
                <label>Cor</label>
                <input class="form-control" type="text" name="cor">
            </div>
            <div class="col-6 col-md-3">
                <label>Armazenamento</label>
                <input class="form-control" type="text" name="armazenamento">
            </div>
            <div class="col-6 col-md-3">
                <label>Memória RAM</label>
                <input class="form-control" type="text" name="ram">
            </div>
            <div class="col-md-6">
                <label>Tela</label>
                <input class="form-control" type="text" name="tela">
            </div>
            <div class="col-6 col-md-3">
                <label>Peso</label>
                <input class="form-control" type="text" name="peso">
            </div>
            <div class="col-6 col-md-3">
                <label>Qualidade</label>
                <input class="form-control" type="text" name="qualidade">
            </div>
            <div class="col-12 col-md-6">
                <label for="img" class="upfile" title="clique aqui para adicionar uma imagem ao produto.">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
                </svg>Subir imagem do produto</label>
                <input type="file" name="img" id="img">
            </div>
            <div class="col-md-12">
                <button class="btn-block button" type="submit" name="send">Cadastrar produto</button>
            </div>
        </div>
    </form>
    
    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
>>>>>>> 5f1acbd74365d9fe170e06e354614c09d642dca1
</html>