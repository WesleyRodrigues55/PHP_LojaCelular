<?php
  // Tenta se conectar ao servidor MySQL
  include("conexaoBanco.php");

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha'])  OR empty($_POST['cpf']))) {
      header("Location: login.php"); exit;
  }

  //recebe dados em post
  $nome = $_POST['usuario'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];
  $img = $_POST['img'];


  // Validação do usuário/senha digitados
  $insert = mysqli_query($conexao, "INSERT INTO usuario VALUES(0, '$nome', '$senha', '$cpf', 1, '$img', 1)");

  if (!$insert) {
      die(@mysqli_error($conexao));
  } else {
      header('Location: ../PHP/cadastroRealizado.php');
  }

  mysqli_close($conexao);
  
  ?>