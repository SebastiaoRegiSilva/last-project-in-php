<?php
    require_once('Conexao.php');
    require_once('Cabecalho.php');
    
    if(!isset($_SESSION['userLogin']))
    {
      unset($_SESSION['userLogin']);
      header('Location: Login.php');
    }else {
      header('Location: Cabecalho.php');
      $logado = $_SESSION['userLogin'];
    }
?>


      <?php
        if ($logado->getPermissao() == 'A'){ ?>
            <h1>Bem vindo à biblioteca, você está conectado como administrador.</h1>
  <?php } 
        elseif ($logado->getPermissao() == 'C'){ ?>
          <h1>Bem vindo à biblioteca, você está conectado como usuário.</h1>
          <h3>Confira nossos exemplares cadastrados e solicite um empréstimo no nosso sistema!</h3>
  <?php } 
        else 
        {?>
          <h1>Bem vindo à biblioteca, você não está conectado!</h1>
          <h3>Confira nossos exemplares cadastrados, cadastre-se e solicite um empréstimo no nosso sistema!</h3>
  <?php } ?>
</body>
</html>