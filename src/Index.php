<?php
    include('C:\xampp\htdocs\last-project-in-php\src\Conexao.php');
    require_once('C:\xampp\htdocs\last-project-in-php\src\Cabecalho.php');
    
    if(!isset($_SESSION['userLogin']) == true)
    {
      unset($_SESSION['Login.php']);
      header('Location: Login.php');
    }

    $logado = $_SESSION['userLogin'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Carlos Corrêa Loyola.</title>
</head>
<body>
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