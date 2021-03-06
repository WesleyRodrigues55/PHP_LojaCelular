
<?php
//libera ações para Geral na index
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

//libera ações para Geral na navegação que faz retornar (direto) para o login
function permissaoGeralNav(){
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 1;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ../Security/login.php");
    exit;
  }
}

//libera ações para o Usuário
function liberaU(){
  $nivel_necessario = 1;
  
  //recebe id usuário
  $UserID = $_SESSION['UsuarioID'];

  if (($_SESSION['UsuarioNivel'] == $nivel_necessario)) {
    //apenas o conteudo do link (href="") que leva para page perfil
    echo'PHP/perfil.php?id='. $UserID . '';
  }
}

//libera ações para o Usuário para a navegação 2
function liberaUNav2(){
  $nivel_necessario = 1;
  
  //recebe id usuário
  $UserID = $_SESSION['UsuarioID'];

  if (($_SESSION['UsuarioNivel'] == $nivel_necessario)) {
    //apenas o conteudo do link (href="") que leva para page perfil
    echo'perfil.php?id='. $UserID . '';
  }
}

//libera ações para o Administrador
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
//-------------------------------------------------------
//libera ações para o Administrador
function libera(){
  $libera_acoes = 2;
  if (($_SESSION['UsuarioNivel'] == $libera_acoes)) {
    //botão de cadastro de produto
    echo'<a href="PHP/cadastroProduto.php"><button class="btn btn-outline-dark button" style="margin: 5px">Cadastrar produto</button></a>';

    //lista de produtos
    echo'<a href="PHP/produtoLista.php?pesquisar="><button class="btn btn-outline-dark button" style="margin: 5px">Lista de produtos</button></a>';

    //cadastro de adm e usuário
    echo'<a href="PHP/cadastroUsuario.php"><button class="btn btn-outline-dark button" style="margin: 5px">Cadastrar um administrador/usuário</button></a>';

    //lista de adm e usuário
    echo'<a href="PHP/usuarioLista.php?pesquisar="><button class="btn btn-outline-dark button" style="margin: 5px">Lista de administrador/usuário</button></a>';

    //carrossel
    echo'<a href="PHP/carrosselLista.php?pesquisar="><button class="btn btn-outline-dark button" style="margin: 5px">Carrossel</button></a>';
    
  }
}

//libera ações para o Usuário
function liberaPerfilAdm(){
  $nivel_necessario = 2;
  
  //recebe id usuário
  $UserID = $_SESSION['UsuarioID'];

  if (($_SESSION['UsuarioNivel'] == $nivel_necessario)) {
    //apenas o conteudo do link (href="") que leva para page perfil
    echo'PHP/perfil.php?id='. $UserID . '';
  }
}

//libera ações para o Usuário para a segunda navegação
function liberaPerfilAdmNav2(){
  $nivel_necessario = 2;
  
  //recebe id usuário
  $UserID = $_SESSION['UsuarioID'];

  if (($_SESSION['UsuarioNivel'] == $nivel_necessario)) {
    //apenas o conteudo do link (href="") que leva para page perfil
    echo'perfil.php?id='. $UserID . '';
  }
}

//Passa o ID e fixa ele na index
function GetId(){
  //recebe id usuário
  $UserID = $_SESSION['UsuarioID'];
  return $UserID;
}

//Passa o ID e fixa ele na index
function GetIdInicioVenda(){
  //recebe id usuário
  $recebeCompraAberta = $_SESSION['compraAberta'];

  return $recebeCompraAberta;
  // return $compraAberta;
}


?>
  
    <!-- script para efeitos e ações (modal) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
