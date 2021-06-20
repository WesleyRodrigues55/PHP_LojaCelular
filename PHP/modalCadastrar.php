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
    .box-button .button-cad {
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

    label {
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

    svg {
      margin-right: 10px;
    }
  </style>
</head>
<body class="body">
    
<!-- Formulário de Cadastro -->
<form action="validacaoNewCadastro.php" method="post">
    <label>Usuário</label>
    <input class="form-control area" type="text" name="usuario" maxlength="25" /><br>

    <label style="outline: none">Senha</label>
    <input class="form-control area" type="password" name="senha" /><br>

    <label>CPF</label>
    <input class="form-control area" type="text" name="cpf" /><br>

    <label for="img" class="upfile">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
      <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
      <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5V14zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4z"/>
      </svg>Subir arquivo</label>
    <input type="file" name="img" id="img"/><br>

    <div class="box-button">
      <input class="btn-block button-cad" type="submit" value="Entrar" />
    </div>
  </form>

</body>
</html>