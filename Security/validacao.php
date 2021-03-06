<?php
  // Tenta se conectar ao servidor MySQL
  include("conexaoBanco.php");

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      // header("Location: login.php");
      echo '<script> 
              alert("sessão inválida"); 
              window.location = "login.php"
            </script>'; 
      exit;
  }

  //recebe dados em post
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  // Validação do usuário/senha digitados
  $consulta = mysqli_query($conexao, "SELECT id, nome, nivel FROM usuario WHERE (nome = '$usuario') AND (senha = '$senha') AND (ATIVO = 1) LIMIT 1");
  if (mysqli_num_rows($consulta) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      include("../PHP/userIncorreto.php");
    //   echo'<a href="alterarUsuario.php?pesquisa=">Clique aqui para alterar seu(a) usuário ou senha</a>';
      exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($consulta);

      // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];

      $recebeIdUser = $_SESSION['UsuarioID'];

      $insertCompraAberta = @mysqli_query($conexao, "INSERT INTO compraaberta VALUES(0, '$recebeIdUser', now())");

      $maxID = @mysqli_query($conexao, "SELECT max(ID) as ID FROM compraaberta");

      $dadosCompraAberta = mysqli_fetch_array($maxID);
      $recebeMaxID = $dadosCompraAberta['ID'];

      //armazena na sessão o ID da compra aberta
      $_SESSION['compraAberta'] = $dadosCompraAberta['ID'];

      if(!$insertCompraAberta){
        die('Queri inválida: ' . @mysqli_error($conexao));
      } else {
        // Redireciona o visitante
        header("Location: restrito.php"); exit;
      }
  }
  ?>