<?php
  // Tenta se conectar ao servidor MySQL
  include("conexaoBanco.php");

  //recebe dados em post
  $nome = $_POST['usuario'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];

  // Validação do usuário/senha digitados
  $consulta = mysqli_query($conexao, "UPDATE usuario SET nome='$nome', senha='$senha' WHERE CPF='$cpf'");
  
  if (!$consulta) {
      die(@mysqli_error($conexao));
  } else {
      header('Location: login.php');
  }

  mysqli_close($conexao);
  ?>