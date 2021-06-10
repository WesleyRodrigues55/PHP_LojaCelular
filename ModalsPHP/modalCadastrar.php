<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
  <style>

    .area {
      box-shadow: 0 0 0 0;
      border: 0 none;
      background-color: rgba(0, 0, 0, 0);
      border-bottom: 1px solid #2c42a1;
      color: rgb(0, 0, 0);
    }
    
    .box-button {
      text-align: center;
    }
    .button-cad {
      border-radius: none;
      border: none;
      background-color: #2c42a1;
      font-size: 20px;
      padding: 15px 30px;
      color: white;
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
    
<!-- Formulário de Cadastro -->
<form action="validacaoNewCadastro.php" method="post">
    <label style="color:black;">Usuário</label>
    <input class="form-control area" type="text" name="usuario" maxlength="25" /><br>

    <label style="color:black" style="outline: none">Senha</label>
    <input class="form-control area" type="password" name="senha" /><br>

    <label style="color:black">CPF</label>
    <input class="form-control area" type="text" name="cpf" /><br>

    <label style="color:black">IMG</label>
    <input type="file" name="img" /><br>

    <div class="box-button">
      <input class="button-cad" type="submit" value="Entrar" />
    </div>
  </form>

</body>
</html>