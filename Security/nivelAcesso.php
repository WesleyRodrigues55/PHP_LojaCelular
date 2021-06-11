
<?php

function permissaoGeral(){
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 1;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: Security/login.php");
      exit;
  }
}

function permissaoAdm(){
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();
  
    $nivel_necessario = 2;
  
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: Security/login.php");
        exit;
    }
  }

  function libera(){
    $libera_acoes = 2;
    if (($_SESSION['UsuarioNivel'] == $libera_acoes)) {
      //cadastro de produto
      echo'<a href=""><button class="btn btn-primary" style="margin: 5px">Cadastrar produto</button></a>';

      //lista de produtos
      echo'<a href=""><button class="btn btn-primary" style="margin: 5px">Lista de produtos</button></a>';

      //cadastro de adm e usuário
      echo'<a href=""><button class="btn btn-primary" style="margin: 5px">Cadastrar um administrador/usuário</button></a>';

    }
  }

  ?>
