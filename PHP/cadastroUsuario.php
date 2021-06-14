<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
    <form class="container" action="cadastroUsuarioCon.php" method="post">
        <h1>Cadastro de Usuários</h1>
        <div class="row">
            <div class="col-md-12">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome">
            </div>
            <div class="col-md-6">
                <label>Senha</label>
                <input class="form-control" type="text" name="senha">
            </div>
            <div class="col-md-6">
                <label>CPF</label>
                <input class="form-control" type="text" name="cpf">
            </div>
            <div class="col-md-4 form-group">
                <label for="perfil">Perfil:</label>
                <select class="form-control input-lg" name="nivel">
                    <option value="2">Administrador</option>
                    <option value="1">Usuário</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="status">Status:</label>
                <select class="form-control input-lg" name="status">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
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
                <button class="btn-block button" type="submit" name="send">Cadastrar usuário/Adm</button>
            </div>
        </div>
    </form>
    
</body>
</html>