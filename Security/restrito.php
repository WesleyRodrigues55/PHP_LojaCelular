<?php

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();
  header("Location: ../index.php?usuarioID=".$_SESSION['UsuarioID']);

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: login.php"); exit;
  }

  ?>
