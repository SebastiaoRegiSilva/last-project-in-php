<?php
    include('conecta.php');
    require_once("cabecalho.php");
        
    $sql = "SELECT * FROM usuario WHERE login = '$logado' ";
    $buscar = mysqli_query($connection,$sql);
    $dados = mysqli_fetch_array($buscar);

    $id = $dados['id'];
    $usuario = $dados['login'];
    $senha = $dados['senha'];
    $niveluser = $dados['permissao'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Carlos Corrêa Loyola.</title>
</head>
<body>
          <?php
            if ($niveluser == 'A') { ?>
          <h1>Bem Vindo à Biblioteca você está conectado como administrador.</h1>
          <?php } ?>
          <?php
            if ($niveluser == 'C') { ?>
          <h1>Bem Vindo à Biblioteca você está conectado como usuário comum.</h1>
          <?php } ?>
</body>
</html>

