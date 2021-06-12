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
</head>
<body>
    <!-- chama nossa navegação -->
    <?php include("navegacao.php"); ?>

    <!-- inicio formulário usuarios -->
    <h1>Cadastro de Usuário</h1>

    <form action="cadastroUsuarioCon.php" method="post">
        <label>Nome</label><br>
        <input type="text" name="nome"><br><br>

        <label>Senha</label><br>
        <input type="text" name="senha"><br><br>

        <label>CPF</label><br>
        <input type="text" name="cpf"><br><br>

        <div class="form-group" width="" style="width: 300px;">
        <label for="perfil">Perfil:</label>
            <select class="form-control input-lg" name="nivel">
                <option value="2">Administrador</option>
                <option value="1">Usuário</option>
            </select>
        </div>

        <div class="form-group" width="" style="width: 300px;">
        <label for="status">Status:</label>
            <select class="form-control input-lg" name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
         </div>

        <label>Imagem</label><br>
        <input type="file" name="img"><br><br>

        <button type="submit" name="send">Cadastrar</button>
    </form>
    
</body>
</html>